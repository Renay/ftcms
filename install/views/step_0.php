<div class="container">
   <div class="row">
      <div class="col-lg-8 offset-lg-2 col-md-12 offset-sm-0">

         <div class="notification" style="min-height: 50px;">
            <?php if(isset($errors) && count($errors) > 0): ?>
               <div class="alert alert-danger" role="alert">
                  <h4 class="alert-heading">Ошибка!</h4>
                  <?php foreach($errors as $error): ?>
                     <p><?=$error['message']?></p>
                  <?php endforeach; ?>
               </div>
            <?php endif; ?>
         </div>
         <div class="card">
            <div class="card-body">
               <div class="container">
                  <h1 class="card-title text-center">Установка FutureCMS  [1/3]</h1>
                  <p class="text-muted text-center">Прежде чем установить данный продукт, прочитайте 
                     <a href="/rules">пользовательское соглашение</a>
                  </p>
                  <hr />
                  <form id="needs-validation" method="POST" action="" novalidate>
                     <div class="row">
                        <div class="col-md-9 mb-4">
                           <label for="host">Хост базы данных</label>
                           <input type="text" name="db_host" value="<?=$db_host ?: ''?>" class="form-control" id="host" placeholder="Введите адрес для соединения с БД" required>
                           <div class="invalid-feedback">
                              Это поле необходимо заполнить
                           </div>
                        </div>
                        <div class="col-md-3 mb-4">
                           <label for="port">Порт</label>
                           <input type="text" name="db_port" value="<?=$db_port ?: 3306?>" id="port" class="form-control" placeholder="Введите порт" required>
                           <div class="invalid-feedback">
                              Это поле необходимо заполнить
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6 mb-4">
                           <label for="user">Имя пользователя</label>
                           <input type="text" name="db_user" value="<?=$db_user ?: ''?>" class="form-control" id="user" placeholder="Имя пользователя БД" required>
                           <div class="invalid-feedback">
                              Это поле необходимо заполнить
                           </div>
                        </div>
                        <div class="col-md-6 mb-4">
                           <label for="pass">Пароль пользователя</label>
                           <div class="input-group">
                              <input type="password" name="db_pass" value="<?=$db_pass ?: ''?>" 
                                     class="form-control" id="pass" placeholder="Пароль пользователя">

                              <span class="input-group-btn">
                                 <button class="btn btn-primary" id="viewpass" type="button">
                                    <span class="fa fa-eye"></span>
                                 </button>
                              </span>
                              <div class="invalid-feedback">
                                 Это поле необходимо заполнить
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12 mb-4">
                           <label for="db_name">Имя базы данных</label>
                           <input type="text" name="db_name" value="<?=$db_name ?: ''?>" class="form-control" id="db_name" placeholder="Введите имя базы данных" required>
                           <div class="invalid-feedback">
                              Это поле необходимо заполнить
                           </div>
                        </div>
                     </div>
                     <button class="btn btn-primary" type="submit">Дальше</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<script type="text/javascript">
window.onload = function() {
   $('#viewpass').on('click', function() {
      var $pass = $('#pass');

      if (!$pass.next().is('.pass-show')) {
         $('<input type="text" class="pass-show form-control" name="db_pass" '+
            'id="pass" placeholder="Пароль пользователя">')
         .val($pass.val()).hide().insertAfter($pass);
      }

      if ($pass.css('display') != 'none') {
          $pass.hide().next().show()
          .parent().find('button')
          .removeClass('btn-primary')
          .addClass('btn-danger');
      } else {
          $pass.show().next().hide()
          .parent().find('button')
          .removeClass('btn-danger')
          .addClass('btn-primary');
      }
   })
}
</script>

<script type="text/javascript">

// Example starter JavaScript 
// for disabling form submissions if there are invalid fields
(function() {
   'use strict';

   window.addEventListener('load', function() {
      var form = document.getElementById('needs-validation');
      form.addEventListener('submit', function(event) {
         if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
         }
         form.classList.add('was-validated');
      }, false);
   }, false);
})();
</script>