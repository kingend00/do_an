@if(isset($menu) && count($menu) != 0)
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <div class="invoice-hs">
            
            <h2>Tên sản phẩm</h2>
        </div>
    </div>
    <div class = "col-sm-5" style="text-align: center"><h2>Khoảng thời gian</h2></div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <div class="invoice-hs">
            
            <h2>Số lượng được bán ra</h2>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="invoice-sp" style="font-size:50px;">
            <table class="table table-hover" style="font-size:50px;" >
                <tbody style="font-size:50px;">
                    @foreach ($menu as $item)
                        <tr>
                        <td>{{ $item->Name_Menu }}</td>
                        <td>{{ $item->Count }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif

@if(isset($combo) && count($combo) != 0)
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <div class="invoice-hs">
            
            <h2>Tên Combo</h2>
        </div>
    </div>
    <div class = "col-sm-5" style="text-align: center"><h2>Khoảng thời gian</h2></div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <div class="invoice-hs">
            
            <h2>Số lượng được bán ra</h2>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="invoice-sp" style="font-size:50px;">
            <table class="table table-hover" style="font-size:50px;" >
                <tbody style="font-size:50px;">
                    @foreach ($combo as $item)
                        <tr>
                        <td>{{ $item->Name_Combo }}</td>
                        <td>{{ $item->Count }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif
@if(isset($into_menu) && count($into_menu) != 0)
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <div class="invoice-hs">
            
            <h2>Tên sản phẩm</h2>
        </div>
    </div>
    <div class = "col-sm-5" style="text-align: center"><h2>Trong ngày</h2></div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <div class="invoice-hs">
            
            <h2>Số lượng được bán ra</h2>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="invoice-sp" style="font-size:50px;">
            <table class="table table-hover" style="font-size:50px;" >
                <tbody style="font-size:50px;">
                    @foreach ($into_menu as $item)
                        <tr>
                        <td>{{ $item->Name_Menu }}</td>
                        <td>{{ $item->Count }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif

@if(isset($into_combo) && count($into_combo) != 0)
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <div class="invoice-hs">
            
            <h2>Tên Combo</h2>
        </div>
    </div>
    <div class = "col-sm-5" style="text-align: center"><h2>Trong ngày</h2></div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <div class="invoice-hs">
            
            <h2>Số lượng được bán ra</h2>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="invoice-sp" style="font-size:50px;">
            <table class="table table-hover" style="font-size:50px;" >
                <tbody style="font-size:50px;">
                    @foreach ($into_combo as $item)
                        <tr>
                        <td>{{ $item->Name_Combo }}</td>
                        <td>{{ $item->Count }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif
@if(isset($data) && count($data) != 0)
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <div class="invoice-hs">
            
            <h2>Loại bàn</h2>
        </div>
    </div>
    <div class = "col-sm-1" style="text-align: center"></div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <div class="invoice-hs">
            
            <h2>Số lần được chọn đặt </h2>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="invoice-sp" style="font-size:50px;">
            <table class="table table-hover" style="font-size:50px;" >
                <tbody style="font-size:50px;">
                    @foreach ($data as $key=>$value)
                        <tr>
                        <td>{{ $key }}</td>
                        <td>{{ $value }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif