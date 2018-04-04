    <form class="form-horizontal" method="POST" action="/admin/merchant/freekassa">
        <div class="form-group">
            <label for="shop_id" class="col-sm-8">ID Магазина</label>
            <div class="col-sm-12">
                <input type="text" name="merchant[shopId]" class="form-control1" value="{{ $shopId }}" id="shop_id" placeholder="Введите id магазина">
            </div>
        </div>
        <div class="form-group">
            <label for="secretFirst" class="col-sm-8">Секретный ключ 1</label>
            <div class="col-sm-12">
                <input type="text" name="merchant[secretOne]" class="form-control1" value="{{ $secretOne }}" id="secretFirst" placeholder="Введите первый секретный ключ">
            </div>
        </div>
        <div class="form-group">
            <label for="secretTwenty" class="col-sm-8">Секретный ключ 2</label>
            <div class="col-sm-12">
                <input type="text" name="merchant[secretTwo]" class="form-control1" value="{{ $secretTwo }}" id="secretTwenty" placeholder="Введите второй секретный ключ">
            </div>
        </div>
        <div class="form-group m-b-0">
            <div class="col-sm-12">
                <button type="button" class="btn btn-default pull-right" onclick="Merchant.onUpdate(this)">Сохранить</button>
            </div>
        </div>
    </form>