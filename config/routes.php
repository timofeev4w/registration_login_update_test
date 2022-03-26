<?php

return array(
    'reg' => 'user/RegUser',
    'changefio' => 'user/ChangeFio',
    'changepass' => 'user/ChangePassword',
    'logout' => 'user/LogOut',
    'user/(.+)' => 'user/ShowUser/$1',
    
    '(.+)' => 'main/Error404',
    '' => 'user/LoginUser'
);

?>