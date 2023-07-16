{{-- Show event list --}}

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    </head>

    <body>

        <div>
            <div class="row">
                <div class="col-md-12">

                  
                    <div class="card">

                        <div class="card-header">
                            <h3>Comparative Statement & Supplier Selection Form</h3>
                        </div>


                        <div class="card-body">

                            <p class="text-center"><b>CS Ref No: </b> {{$cs->cs_ref_no}}<b class="mx-4">Effective Date:</b>{{$cs->effective_date}}</p>

                            <table id="#csTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">Sl No</th>
                                        <th>Material's Name</th>
                                        <th>Unit</th>
                                        @foreach ($cs_details->pluck('supplier_id')->unique() as $supplier)

                                        @php
                                        $data = \App\Models\Supplier::find($supplier);
                                        @endphp
                                        @if($data)

                                           <th id= "supplierHeader" data-value= {{$supplier}}>{{$data->supplier_name}} </th>
                                        
                                        @else
                                           <th>Name not found </th>
                                        @endif
                                    
                                        @endforeach
                 

                                    </tr>
                                </thead>

                                <tbody>
                                  
                                    @foreach ($cs_details->pluck('material_id')->unique() as $material)

                                    @php
                                    $materials = \App\Models\Material::find($material);
                                    @endphp
                                    @if($materials)
                                    
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$materials->material_name}}</td>
                                            <td>{{$materials->unit}}</td>

                                        @foreach ($cs_details->pluck('supplier_id')->unique() as $supplier)

                                        <td> </td>
                                        @endforeach
                                        
                                        </tr>
                                
                                    @else
                                    <tr>Name not found </tr>
                                    @endif  
                                    @endforeach
                                  
                                    <tr>
                                        <td>--</td>
                                        <td>Terms and Condition</td>
                                        <td>-</td>

                                        @foreach ($cs_details->pluck('supplier_id')->unique() as $supplier)
                                        
                                        <td id= "terms_and_condition"> </td>
                                        @endforeach
                                        
                                    </tr>

                                    <tr>
                                        <td>--</td>
                                        <td>Grade</td>
                                        <td>-</td>

                                        @foreach ($cs_details->pluck('supplier_id')->unique() as $supplier)
                                        
                                        <td id="grade"> </td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td>--</td>
                                        <td>VAT</td>
                                        <td>-</td>

                                        @foreach ($cs_details->pluck('supplier_id')->unique() as $supplier)
                                        
                                        <td id="vat"> </td>
                                        @endforeach
                                    </tr>

                                    <tr>
                                        <td>--</td>
                                        <td>TAX</td>
                                        <td>-</td>

                                        @foreach ($cs_details->pluck('supplier_id')->unique() as $supplier)
                                        
                                        <td id="tax"></td>
                                        @endforeach
                                    </tr>

                                    <tr>
                                        <td>--</td>
                                        <td>Credit Period</td>
                                        <td>-</td>
                                        @foreach ($cs_details->pluck('supplier_id')->unique() as $supplier)
                                        
                                        <td id="credit_period"></td>
                                        @endforeach
                                    </tr>

                                    <tr>
                                        <td>--</td>
                                        <td>Material Availability</td>
                                        <td>-</td>
                                        @foreach ($cs_details->pluck('supplier_id')->unique() as $supplier)
                                        
                                        <td id="material_availability"></td>
                                        @endforeach
                                    </tr>

                                    <tr>
                                        <td>--</td>
                                        <td>Delivery Condition</td>
                                        <td>-</td>

                                        @foreach ($cs_details->pluck('supplier_id')->unique() as $supplier)
                                        
                                        <td id="delivery_condition"></td>
                                        @endforeach
                                    </tr>

                                    <tr>
                                        <td>--</td>
                                        <td>Lead time required by Supplier</td>
                                        <td>-</td>

                                        @foreach ($cs_details->pluck('supplier_id')->unique() as $supplier)
                                        
                                        <td id="lead_time"></td>
                                        @endforeach
                                    </tr>

                                    <tr>
                                        <td>--</td>
                                        <td>Remarks</td>
                                        <td>-</td>

                                        @foreach ($cs_details->pluck('supplier_id')->unique() as $supplier)
                                        
                                        <td id="remarks"></td>
                                        @endforeach
                                    </tr>


                                </tbody>

                            </table>

                         
                    </div>
                </div>

            </div>

        </div>
        </div>
    </body>

    <script>
        $(document).ready(function() {

            var thValues = [];
            $('[id^="supplierHeader"]').each(function() {
            //var columnIndex = $(supplierHeader).index();
            var columnIndex = $(this).index();
            var supplier_id =$(this).data('value');
            thValues.push(supplier_id);
            console.log(supplier_id);

            var cs_supplier_details = @json($cs_supplier_details);
            
            var dataArray = cs_supplier_details.filter(function(item) {
            return item.supplier_id == supplier_id;
            })[0];
        
            
            var rowIndex = 8; // Row index (zero-based)
            var columnIndex = 2; // Column index (zero-based)
            var data = 'New Cell';
            
            var $targetRow = $('#csTable tbody tr').eq(rowIndex);
            $targetRow.append($('<td>').text(data));

            console.log(dataArray, columnIndex, data);
            
            });
            
            console.log('All th values:', thValues);
        });
</script>

</html>