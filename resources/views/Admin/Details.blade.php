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