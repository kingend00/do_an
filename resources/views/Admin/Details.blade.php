@if (isset($data))
    <ul>
        <h1>Chi tiết đơn {{ $data[0]->booktable_id }}</h1><br>
        
    @foreach($data as $value)
    
    @if($value->menu_id != null)
    <li>
        <?php $data = \App\Model\M_Booktable_Details::where('menu_id',$value->menu_id)->where('booktable_id',$value->booktable_id)->first(); ?>
        Tên món : {{($data->menu[0]->name)}}
    <li>
    @else
    <li>
        <?php $data = \App\Model\M_Booktable_Details::where('combo_id',$value->combo_id)->where('booktable_id',$value->booktable_id)->first(); ?>
        Tên combo : {{($data->combo[0]->name)}}
    </li>
    @endif
    <li>Số lượng : {{ $value->quantity }} </li>
    <br><br>

    @endforeach
    </ul>
@endif

@if(isset($combo))
    <ul>
        <h1>Chi tiết {{ $combo[0]->name_combo }}</h1><br>
        @foreach ($combo as $item)
             <li> Tên thành phần : <b>{{ $item->name_menu }}</b></li>
             <li>Số lượng : {{ $item->quantity }}</li>
             <li> Giá : {{ $item->menu_price }}</li>
            <br><br>
        @endforeach

    </ul>

@endif
@if(isset($feedback))
    <ul>
            <h1>Tin nhắn phản hồi</h1><br>
            @foreach($feedback as $item)
            <li> Tên khách hàng : <b>{{ $item->name }}</b></li>
            <li> Số điện thoại : <b>{{ $item->phone }}</b></li>
            <li> Lời nhắn : {{ $item->message }}</li>
            @endforeach

    </ul>

@endif