@if(isset($menu) && count($menu) != 0)

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="invoice-sp" style="font-size:50px;">
            <table class="table table-hover" style="font-size:50px;" >
                <thead>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng được bán ra</th>
                </thead>
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
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="invoice-sp" style="font-size:50px;">
            <table class="table table-hover" style="font-size:50px;" >
                <thead>
                    <th>Tên Combo</th>
                    <th>Số lượng được bán ra</th>
                </thead>
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
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="invoice-sp" style="font-size:50px;">
            <table class="table table-hover" style="font-size:50px;" >
                <thead>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng được bán ra</th>
                </thead>
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
    @elseif(isset($into_menu) && count($into_menu) <=0)
        <h2>Không có sản phẩm nào được bán trong ngày</h2>
    
@endif

@if(isset($into_combo) && count($into_combo) != 0)

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="invoice-sp" style="font-size:50px;">
            <table class="table table-hover" style="font-size:50px;" >
                <thead>
                    <th>Tên Combo</th>
                    <th>Số lượng được bán ra</th>
                </thead>
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
@elseif(isset($into_combo) && count($into_combo) <= 0)
        <h2>Không có combo nào được bán trong ngày</h2>
    
@endif

@if(isset($data) && count($data) > 0)

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="invoice-sp" style="font-size:50px;">
            <table class="table table-hover" style="font-size:50px;" >
                <thead>
                    <th>Loại bàn được đặt</th>
                    <th>Số lần được đặt</th>
                </thead>
                <tbody style="font-size:50px;">
                    @foreach ($data as $key=>$value)
                        <tr>
                        <td>{{ $key }}</td>
                        <td>{{ $value }}  lần</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@elseif(isset($data) && count($data) <= 0)
        <h2>Không có bàn nào </h2>
    
@endif