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
                  <h1 class="card-title text-center">Установка FutureCMS [3/3]</h1>
                  <p class="text-muted text-center">Данные главного администратора для входа в админ панель</a>
                  </p>
                  <hr>
                  <form id="needs-validation" method="POST" action="" novalidate>
                     <div class="row">
                        <div class="col-md-6 mb-4">
                           <label for="username">Ваш никнейм</label>
                           <input type="text" name="username" value="<?=$username ?: ''?>" class="form-control" 
                                  id="username" placeholder="Введите ваш никнейм" required>
                           <div class="invalid-feedback">
                              Введите ваш никнейм
                           </div>
                        </div>
                        <div class="col-md-6 mb-4">
                           <label for="password">Ваш пароль</label>
                           <input type="password" name="password" value="<?=$username ?: ''?>" class="form-control" 
                                  id="password" placeholder="Введите желаемый пароль" required>
                           <div class="invalid-feedback">
                              Введите ваш пароль
                           </div>
                        </div>
                     </div>

                     <div id="merchlist"></div>

                     <button class="btn btn-primary" type="submit">Добавить</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>