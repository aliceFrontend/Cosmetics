<?php

class AdminController
{
		public function actionIndex()
    {
       if(User::isAdmin() == 1){
       	header("Location: /admin");
        return true;
       }else{
       	header("Location: /");
       }
    }  
}