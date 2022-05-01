<?php
class Calendar {
  // CONSTRUCTOR - CONNECT TO DATABASE
  private $pdo = null;
  private $stmt = null;
  public $error = "";
  function __construct () {
    try {
      $this->pdo = new PDO(
        "mysql:host=localhost;dbname=hv_audio_visual" "root", "", [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
      );
    } catch (Exception $ex) { exit($ex->getMessage()); }
  }

  // DESTRUCTOR - CLOSE DATABASE CONNECTION
  function __destruct () {
    if ($this->stmt!==null) { $this->stmt = null; }
    if ($this->pdo!==null) { $this->pdo = null; }
  }
 
  // HELPER - EXECUTE SQL QUERY
  function exec ($sql, $data=null) {
    try {
      $this->stmt = $this->pdo->prepare($sql);
      $this->stmt->execute($data);
      return true;
    } catch (Exception $ex) {
      $this->error = $ex->getMessage();
      return false;
    }
  }
 
  // SAVE EVENT
  function save ($type, $is_nonprofit, $order_date, $start, $end, $setup, $breakdown, $is_staffed, $creator, $name, $attendees, $contact, $notes, $id=null) {
    // START & END DATE QUICK CHECK 
    $uStart = strtotime($start);
    $uEnd = strtotime($end);
    if ($uEnd < $uStart) { $this->error = "End date cannot be earlier than start date";
      return false;
    }

    // INSERT OR UPDATE
    if ($id==null) {
      $sql = "INSERT INTO `event_order` (`event_type`, `isnonprofit`, `order_date`, `event_start`, `event_end`, `setup_start`, `breakdown_start`, `is_staffed`, `created_by`, `event_name`, 
        `expected_num_people`, `contact_option`, `event_notes`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
      $data = [$type, $is_nonprofit, $order_date, $start, $end, $setup, $breakdown, $is_staffed, $creator, $name, $attendees, $contact, $notes];
    } else {
      $sql = "UPDATE `event_order` SET `event_type`=?, `isnonprofit`=?, `order_date`=?, `event_start`=?, `event_end`=?, `setup_start`=?, `breakdown_start`=?, `is_staffed`=?, `created_by`=?, `event_name`=?, 
      `expected_num_people`=?, `contact_option`=?, `event_notes`=?) WHERE `event_order_ID`=?";
      $data = [$type, $is_nonprofit, $order_date, $start, $end, $setup, $breakdown, $is_staffed, $creator, $name, $attendees, $contact, $notes, $id];
    }

    //  EXECUTE
    return $this->exec($sql, $data);
  }

  // DELETE EVENT
  function del ($id) {
    return $this->exec("DELETE FROM `event_order` WHERE `event_order_ID`=?", [$id]);
  }

  // GET EVENTS FOR SELECTED MONTH
  function get ($month, $year) {
    // FIRST & LAST DAY OF MONTH
    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
    $dayFirst = "{$year}-{$month}-01 00:00:00";
    $dayLast = "{$year}-{$month}-{$daysInMonth} 23:59:59";

    // GET EVENTS
    if (!$this->exec(
      "SELECT * FROM `event_order` WHERE (
        (`event_start` BETWEEN ? AND ?)
        OR (`event_end` BETWEEN ? AND ?)
        OR (`event_start` <= ? AND `event_end` >= ?)
      )", [$dayFirst, $dayLast, $dayFirst, $dayLast, $dayFirst, $dayLast]
    )) { return false; }
    
    // $events = [
    // "e" => [ EVENT ID => [DATA], EVENT ID => [DATA], ... ],
    // "d" => [ DAY => [EVENT IDS], DAY => [EVENT IDS], ... ]
    // ]
 
    $events = ["e" => [], "d" => []];
    while ($row = $this->stmt->fetch()) {
      $eventStartMonth = substr($row["event_start"], 5, 2);//parsing months
      $eventEndMonth = substr($row["event_end"], 5, 2);
      $eventStartDay = $eventStartMonth==$month //parsing days, if event is longer than a month it sets all current viewed dates to the event
                 ? (int)substr($row["event_start"], 8, 2) : 1 ;
      $eventEndDay = $eventEndMonth==$month 
               ? (int)substr($row["event_end"], 8, 2) : $daysInMonth ;
      for ($d=$eventStartDay; $d<=$eventEndDay; $d++) {//iterating through all days in the event and adding the event to that date 
        if (!isset($events["d"][$d])) { $events["d"][$d] = []; }
        $events["d"][$d][] = $row["event_order_ID"];
      }
      $events["e"][$row["event_order_ID"]] = $row;
      $events["e"][$row["event_order_ID"]]["first"] = $eventStartDay;
    }
    return $events;
  }
}

// DATABASE SETTINGS - CHANGE TO YOUR OWN!
define("DB_HOST", "localhost");
define("DB_NAME", "hv_audio_visual");
define("DB_USER", "root");
define("DB_PASSWORD", "");

// NEW CALENDAR OBJECT
$_CAL = new Calendar();