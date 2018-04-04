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
                  <h1 class="card-title text-center">Конец установки</h1>
                  <p class="text-muted text-center">Спасибо за то что вы выбрали именно нас, с ув. 
                  	<a href="//vk.com/mc_perfect">Perfect Team</a>
                  </p>
                  <hr>
                  <div class="row">
                     <div class="col-md-12 mb-4">
                     	<p class="text-center">Поздравляем. Вы успешно завершили процесс установки.<br />
                     		Теперь вам необходимо удалить папку <strong>install</strong><br />
                     		из корневой папки вашего сайта для дальнейшей работы.
                     			<br />
                     			<br />
                     		Сайт разработчика: <a href="//mcperfects.com"><strong>mcperfects.com</strong></a><br />
                     		Группа вконтакте: <a href="//vk.com/mc_perfect"><strong>vk.com/mc_perfect</strong></a>
                     	</p>
                     	<br />

                     	<div class="text-center">
                     		<a href="//<?=$_SERVER['HTTP_HOST']?>">На главную</a>
                     	|
                     		<a href="//<?=$_SERVER['HTTP_HOST']?>/admin">В админку</a>
                     	</div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>