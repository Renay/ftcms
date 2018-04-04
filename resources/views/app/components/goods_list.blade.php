@foreach($goods as $category => $product)
    <optgroup label='{{$category ?: 'Без категории'}}'>
        @foreach($product as $p)
            <option value='{{$p['id']}}'>{{$p['name']}} - {{$p['price']}} рублей</option>
        @endforeach
    </optgroup>
@endforeach