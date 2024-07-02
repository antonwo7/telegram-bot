<?php

const MY_REQUESTS_HEADER = "\xE2\x9C\xB3\xE2\x9C\xB3 <b>YOUR REQUESTS</b> \xE2\x9C\xB3\xE2\x9C\xB3";
const MY_OPENED_REQUESTS_HEADER = "\xE2\x9C\xB3\xE2\x9C\xB3 <b>YOUR OPENED REQUESTS</b> \xE2\x9C\xB3\xE2\x9C\xB3";
const MY_CLOSED_REQUESTS_HEADER = "\xE2\x9C\xB3\xE2\x9C\xB3 <b>YOUR CLOSED REQUESTS</b> \xE2\x9C\xB3\xE2\x9C\xB3";

const EMPTY_REQUESTS_TEXT = 'You have no requests';
const ENTER_REQUEST_TITLE_TEXT = "\xE2\x9C\xB3\xE2\x9C\xB3 <b>Briefly fill in the subject of the request</b> \xE2\x9C\xB3\xE2\x9C\xB3";
const ENTER_REQUEST_TEXT_TEXT = "\xE2\x9C\xB3\xE2\x9C\xB3 <b>Fill in the description of the request</b> \xE2\x9C\xB3\xE2\x9C\xB3";
const ENTER_REQUEST_RESULT_TEXT = "\xE2\x9C\xB3\xE2\x9C\xB3 <b>Your request has been sent successfully</b> \xE2\x9C\xB3\xE2\x9C\xB3";
const ENTER_REQUEST_RESULT_WAIT = "Expect an answer within 5 minutes in the comments to this post";
const REQUEST_CLOSED_TEXT = "Request closed by User";
const REQUEST_OPENED_TEXT = "Request reopened by User";
const UNKNOWN_USER_TEXT = "\xE2\x9D\x97 Unknown user \xE2\x9D\x97";
const VIEW_LABEL = "View";
const HOME_LABEL = "Main Menu";
const MY_REQUESTS_LABEL = "My requests";
const BACK_LABEL = "Back";
const CLOSE_REQUEST_LABEL = "Close request";
const OPEN_REQUEST_LABEL = "Reopen request";
const ENTER_TEXT_LABEL = "Enter just a text";
const REQUEST_TYPE_LABEL = "Request type";
const REQUEST_THEME_LABEL = "Request theme";
const REQUEST_TEXT_LABEL = "Request description";
const UNKNOWN_COMMAND_LABEL = "\xE2\x9D\x97 Unknown command \xE2\x9D\x97";
const OPENED_REQUESTS_LABEL = "Opened requests";
const CLOSED_REQUESTS_LABEL = "Closed requests";

const REQUEST_STATUSES = [
    'open' => 'In progress',
    'closed' => 'Closed',
    'default' => 'Undefined',
];

const NEW_NOTIFICATION_LABEL = "New comment on request";
const STATUS_LABEL = "Status";
const REQUEST_ID_LABEL = "Request ID";
const REQUEST_SUBJECT_LABEL = "Request subject";

const REGISTRATION_LABEL = "Registration";
const REGISTRATION_INPUT_LABEL = "Enter your email";
const ATTACHMENT_LABEL = "Attachment";