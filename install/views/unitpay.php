<div class="row">
   <div class="col-md-6 mb-4">
      <label for="id_shop">ID Магазина</label>
      <input type="text" name="data[shopId]" class="form-control" id="id_shop" 
             placeholder="Введите ID вашего магазина в системе UnitPay" required>
      <div class="invalid-feedback">
         Это поле необходимо заполнить
      </div>
   </div>
   <div class="col-md-6 mb-4">
      <label for="secret">Секретный ключ</label>
      <input type="text" name="data[secretKey]" value="" class="form-control" id="secret" 
             placeholder="Введите секретный ключ в системе UnitPay" required>
      <div class="invalid-feedback">
         Это поле необходимо заполнить
      </div>
   </div>
</div>