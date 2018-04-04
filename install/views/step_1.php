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
                  <h1 class="card-title text-center">Установка FutureCMS [2/3]</h1>
                  <p class="text-muted text-center">Необходимые настройки системы</a>
                  </p>
                  <hr>
                  <form id="needs-validation" method="POST" action="" novalidate>
                     <div class="row">
                        <div class="col-md-6 mb-4">
                           <label for="name">Название сайта</label>
                           <input type="text" name="name_site" value="<?=$name_site ?: ''?>" class="form-control" 
                                  id="name" placeholder="Введите название вашего сайта" required>
                           <div class="invalid-feedback">
                              Это поле необходимо заполнить
                           </div>
                        </div>
                        <div class="col-md-6 mb-4">
                           <label for="merchant">Платежный агрегатор</label>
                           <select name="merchant" id="merchant" class="form-control" required>
                              <option value="" selected disabled>Не выбран</option>
                              <?php foreach(array_keys($merchant) as $m):?>
                                 <option value="<?=$m?>"><?=ucfirst($m)?></option>
                              <?php endforeach; ?>
                           </select>
                           <div class="invalid-feedback">
                              Выберите платёжный агрегатор
                           </div>
                        </div>
                     </div>

                     <div id="merchlist"></div>

                     <button class="btn btn-primary" type="submit">Установить</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>



<script type="text/javascript">
window.onload = function() {
   $('#merchant').on('change', function() {
      if($('form .row').length > 1) {
         $('form .row').last().remove();
      }

      $('#merchlist').load('views/'+ $(this).val() +'.php');
   });
}
</script>

<script type="text/javascript">

// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
   'use strict';

   window.addEventListener('load', function() {
      var form = document.getElementById('needs-validation');
      form.addEventListener('submit', function(event) {
         var select = document.getElementById("merchant");
         var selValue = select.options[select.selectedIndex].value;

         if (selValue.length < 1) {
            event.preventDefault();
            event.stopPropagation();
         }

         if(form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
         }
         form.classList.add('was-validated');
      }, false);
   }, false);
})();
</script>