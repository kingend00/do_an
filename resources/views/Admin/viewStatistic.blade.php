@if(isset($menu) && count($menu) != 0)
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <div class="invoice-hs">
            
            <h2>Tên sản phẩm</h2>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <div class="invoice-hs">
            
            <h2>Số lượng được bán ra</h2>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="invoice-sp">
            <table class="table table-hover">
                <thead>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng bán ra</th>
                </thead>
                <tbody>
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