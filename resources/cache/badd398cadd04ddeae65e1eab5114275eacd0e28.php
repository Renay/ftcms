    <form class="form-horizontal" method="POST" action="/admin/merchant/unitpay">
        <div class="form-group">
            <label for="publicKey" class="col-sm-8">ID Магазина</label>
            <div class="col-sm-12">
                <input type="text" name="merchant[publicKey]" class="form-control1" value="<?php echo e($publicKey); ?>" id="shop_id" placeholder="Введите id магазина">
            </div>
        </div>
        <div class="form-group">
            <label for="secretKey" class="col-sm-8">Секретный ключ</label>
            <div class="col-sm-12">
                <input type="text" name="merchant[secretKey]" class="form-control1" value="<?php echo e($secretKey); ?>" id="secretKey" placeholder="Введите секретный ключ">
            </div>
        </div>
        <div class="form-group m-b-0">
            <div class="col-sm-12">
                <button type="button" class="btn btn-default pull-right" onclick="Merchant.onUpdate(this)">Сохранить</button>
            </div>
        </div>
    </form>