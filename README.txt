The HVAV_dbV2 folder contains the versions of code necessary to test all of Tai, Jorge, Antonios, Nicks, and Asfands 
Portion of the project. 

Tai, Jorge, and Antonios run on hv_audio_visual_v2.sql
Nicks uses hvav-modified-1.sql

HVAV_ALT contains Chris session.classes implementation for tracking login, and restricting features.
The error handling done in $_SESSIONS in HVAV_dbV2 conflicts with the sessions.classes session data from Chris portion, 
so the more significant implementation of the session.classes approach of tracking login and 
using session.classes approach is contained in HVAV_ALT until the error handling can be converted to session.classes format. 
The alt version does not contain nicks error handling.

HVAV_ALT runs on hvav-modified-1.sql

All Docs are in HVAV_dbV2