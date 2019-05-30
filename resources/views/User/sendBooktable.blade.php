@if(isset($data))
  <h1 style="color:red">RogTeam Place</h1>
    <h2>Đơn đặt bàn : {{$data->booktable_id}}</h2>
 
<h3>Khách hàng : {{ $data->name }}</h3>
<h3>Ngày  : {{ $data->date }}</h3>
<h3>Thời gian : {{ $data->time }}</h3>
<h3>Số điện thoại  : {{ $data->phone }}</h3>
<h3> Email : {{ $data->email }}</h3>
<?php $data2 = \App\Model\M_Booktable_Details::where('booktable_id',$data->booktable_id)->get(); ?>
 <ul>
@foreach($data2 as $value)
@if($value->menu_id != null)
    <li>
        <?php $data2 = \App\Model\M_Booktable_Details::where('menu_id',$value->menu_id)->where('booktable_id',$value->booktable_id)->first(); ?>
        Tên món : {{($data2->menu[0]->name)}}
    </li>
    @else
    <li>
        <?php $data2 = \App\Model\M_Booktable_Details::where('combo_id',$value->combo_id)->where('booktable_id',$value->booktable_id)->first(); ?>
        Tên combo : {{($data2->combo[0]->name)}}
    </li>
    @endif
    <li>Số lượng : {{ $value->quantity }} </li>
    <br><br>
    
@endforeach
 </ul>
 <h2>Hoàng X's</h2>
@endif