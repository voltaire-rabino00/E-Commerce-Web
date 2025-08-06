<?php
function getProfileImage($profilePic) {
    $default = '../assets/profile/default.png';
    if (empty($profilePic)) {
        return $default;
    }
    $imgPath = ltrim($profilePic, './');
    if (strpos($imgPath, 'assets/') === 0) {
        return '../' . $imgPath;
    } elseif (strpos($imgPath, '../assets/') === 0) {
        return $imgPath;
    } elseif (filter_var($imgPath, FILTER_VALIDATE_URL)) {
        return $imgPath;
    } else {
        return '../assets/profile/' . $imgPath;
    }
}
