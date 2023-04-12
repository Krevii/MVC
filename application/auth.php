<?php
class Auth {
    // запуск сессии
    public function startSession() {
      session_start();
    }
  
    // авторизация пользователя
    public function login($email, $password) {
      // здесь должна быть логика проверки логина и пароля
      // если пользователь прошел проверку, то создаем объект User
      //$user = new User($id, $name, $email, $role);
  
      // сохраняем информацию о пользователе в сессии
      //$_SESSION['user'] = $user;
    }
  
    // выход из системы
    public function logout() {
      session_destroy();
    }
  
    // проверка прав доступа пользователя
    public function hasPermission($role) {
      if(isset($_SESSION['user']) && $_SESSION['user']->role === $role) {
        return true;
      }
      return false;
    }
  }
  