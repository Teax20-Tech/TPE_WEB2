<?php

class ViewAuth {

    public function showLogin($error = null) {
        require './templates/login.phtml';
    }
}