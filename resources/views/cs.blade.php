<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <title>Document</title>
    </head>

    <body>
        <h2>Add Comparative Statement and Supplier</h2>

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <form action="{{ url('/cs') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- header segment --}}

                        <div class="card">
                            <div style="background-color: #004d99;" class="card-header text-white">
                                <h5 class="text-center"> Comparative Statement</h5>
                            </div>

                            <div class="card-body">


                                <div class="row">

                                    <div class="col-md-4 mb-3">
                                        <label>CS Reference No</label>
                                        <input type="text" name="cs_ref_no" class="form-control form-control-sm"
                                            tabindex="2" />
                                        @error('cs_ref_no') <small class="text-danger"> {{ $message }}</small>@enderror
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>Effective Date</label>
                                        <input type="date" name="effective_date" class="form-control form-control-sm"
                                            tabindex="3" />
                                        @error('effective_date') <small class="text-danger">
                                            {{ $message }}</small>@enderror
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label>Expiry Date</label>
                                        <input type="date" name="expiry_date" class="form-control form-control-sm"
                                            tabindex="3" />
                                        @error('expiry_date') <small class="text-danger">
                                            {{ $message }}</small>@enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label>Remarks</label>
                                        <input type="text" name="remarks" class="form-control form-control-sm"
                                            tabindex="8" />
                                        @error('remarks') <small class="text-danger"> {{ $message }}</small>@enderror
                                    </div>


                                </div>


                            </div>
                        </div>

                        {{-- Material section --}}

                        <div class="card">
                            <div style="background-color: #004d99;" class="card-header text-white">
                                <h5 class="text-center"> Materials</h5>
                            </div>

                            <div class="card-body">

                                <table class="table table-bordered" id="materials-table">
                                    <tr class="field">
                                        <th>Materials</th>
                                        <th>Unit</th>
                                        <th><button type="button" id="add-field" class="btn btn-success">+</button></th>
                                    </tr>
                                    <tr class="field">
                                        <td><select class="form-control form-control-sm mySelect" id="material_id[]"
                                                name="material_id[]">
                                                <option value="" selected="">Select Material</option>

                                                @foreach ($materials as $material)

                                                <option value={{$material->id}}>{{$material->material_name}}</option>

                                                @endforeach
                                            </select></td>
                                        <td><input type="text" name="material_unit[]" placeholder="Unit"
                                                class="form-control"></td>
                                        <td><button type="button" class="btn btn-danger">-</button></td>
                                    </tr>
                                </table>


                            </div>
                        </div>

                        {{-- Supplier section --}}

                        <div class="card">
                            <div style="background-color: #004d99;" class="card-header text-white">
                                <h5 class="text-center"> Suppliers</h5>
                            </div>

                            <div class="card-body">

                                <table class="table table-bordered" id="suppliers-table">
                                    <tr class="supplier-field">

                                        <th>Selected</th>
                                        <th>Supplier Name</th>
                                        <th>Supplier Info</th>
                                        <th>Price Collection Way</th>
                                        <th>Grade</th>
                                        <th>VAT</th>
                                        <th>Tax</th>
                                        <th>Credit Period</th>
                                        <th>Material Availability</th>
                                        <th>Delivery Condition</th>
                                        <th>Required Time</th>
                                        <th>Remarks</th>
                                        <th><button type="button" id="supplier-add-field"
                                                class="btn btn-success">+</button></th>
                                    </tr>
                                    <tr class="supplier-field">

                                        <td>
                                            <select class="form-control form-control-sm" name="selected[]">
                                                <option value="0" selected="">Yes</option>
                                                <option value='1'>No</option>

                                            </select>
                                        </td>

                                        <td>

                                            <select class="form-control form-control-sm mySupplierSelect"
                                                name="supplier_id[]">
                                                <option value="" selected="">Select Supplier</option>
                                                @foreach ($suppliers as $supplier)
                                                <option value={{$supplier->id}}>{{$supplier->supplier_name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td><input type="text" name="supplier_info[]" placeholder="Supplier Info"
                                                class="form-control"></td>
                                        <td><input type="text" name="price_colllection_way[]"
                                                placeholder="Price Collection Way" class="form-control"></td>
                                        <td>
                                            <select class="form-control form-control-sm" name="grade[]">
                                                <option value="0" selected="">A</option>
                                                <option value='1'>B</option>
                                                <option value='2'>C</option>

                                            </select>
                                        </td>

                                        <td>
                                            <select class="form-control form-control-sm" name="vat[]">
                                                <option value="0" selected="">Included</option>
                                                <option value='1'>Not Included</option>

                                            </select>
                                        </td>

                                        <td>
                                            <select class="form-control form-control-sm" name="tax[]">
                                                <option value="0" selected="">Included</option>
                                                <option value='1'>Not Included</option>
                                            </select>
                                        </td>

                                        <td><input type="text" name="credit_period[]" placeholder="Credit Period"
                                                class="form-control"></td>
                                        <td><input type="text" name="material_availability[]" placeholder="Availability"
                                                class="form-control"></td>

                                        <td>
                                            <select class="form-control form-control-sm" name="delivery_condition[]"
                                                tabindex="1">
                                                <option value="0" selected="">With Carrying</option>
                                                <option value='1'>Without Carrying</option>
                                            </select>
                                        </td>

                                        <td><input type="text" name="required_time[]" placeholder="Required Time"
                                                class="form-control"></td>
                                        <td><input type="text" name="supplier_remarks[]" placeholder="Remarks"
                                                class="form-control"></td>
                                        <td><button type="button" class="btn btn-danger">-</button></td>
                                    </tr>
                                </table>


                            </div>
                        </div>

                        <div class="card">
                            <div style="background-color: #004d99;" class="card-header text-white">
                                <h5> Comparative Statement Details
                                <button type="button" class="btn btn-success float-end" id="getDataButton">Get Selected Data</button></h5>
                            </div>

                            <div class="card-body">

                                <table class="table table-bordered" id="cs-details-table">

                                    <thead>
                                        <tr>
                                            <th>Material</th>
                                            <!-- Add other table headers for task details -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Existing tasks will be populated here -->
                                    </tbody>

                                </table>


                            </div>
                        </div>

                        <div class="col-md-12 mb-3 m-3">
                            <button type="submit" class="btn btn-primary text-white float-end">Save</button>
                        </div>

                    </form>

                </div>

            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
        </script>

        <script>
            $(document).ready(function () {
                    // Add row button click event
                    $("#add-field").click(function () {
                        var row = `
                            <tr class="field">
                                <td><select class="form-control form-control-sm mySelect" id="material_id[]" name="material_id[]" tabindex="1">
                                        <option value="" selected="">Select Material</option>
                                
                                        @foreach ($materials as $material)
                                
                                        <option value={{$material->id}}>{{$material->material_name}}</option>
                                
                                        @endforeach
                                    </select></td>
                                <td><input type="text" name="material_unit[]" placeholder="Unit" class="form-control"></td>
                                <td><button type="button" class="remove">-</button></td>
                            </tr>
                        `;
        
                        $("#materials-table").append(row);
                    });
        
                    // Remove row button click event
                    $(document).on("click", ".remove", function () {
                        $(this).closest("tr.field").remove();
                    });
                });
                
        </script>

        <script>
            $(document).ready(function () {
                            // Add row button click event
                            $("#supplier-add-field").click(function () {
                                var row = `
                                    <tr class="supplier-field">
                                        
                                        <td>
                                            <select class="form-control form-control-sm" name="selected[]">
                                                <option value="0" selected="">Yes</option>
                                                <option value='1'>No</option>
                                        
                                            </select>
                                        </td>

                                        <td>
                                           
                                            <select class="form-control form-control-sm mySupplierSelect" name="supplier_id[]">
                                                <option value="" selected="">Select Supplier</option>
                                                @foreach ($suppliers as $supplier)
                                                <option value={{$supplier->id}}>{{$supplier->supplier_name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td><input type="text" name="supplier_info[]" placeholder="Supplier Info" class="form-control"></td>
                                        <td><input type="text" name="price_colllection_way[]" placeholder="Price Collection Way" class="form-control"></td>
                                        <td>
                                            <select class="form-control form-control-sm" name="grade[]" tabindex="1">
                                                <option value="0" selected="">A</option>
                                                <option value='1'>B</option>
                                                <option value='2'>C</option>
                                        
                                            </select>
                                        </td>
                                        
                                        <td>
                                            <select class="form-control form-control-sm" name="vat[]" tabindex="1">
                                                <option value="0" selected="">Included</option>
                                                <option value='1'>Not Included</option>
                                        
                                            </select>
                                        </td>
                                        
                                        <td>
                                            <select class="form-control form-control-sm" name="tax[]" tabindex="1">
                                                <option value="0" selected="">Included</option>
                                                <option value='1'>Not Included</option>
                                            </select>
                                        </td>
                                        
                                        <td><input type="text" name="credit_period[]" placeholder="Credit Period" class="form-control"></td>
                                        <td><input type="text" name="material_availability[]" placeholder="Availability" class="form-control"></td>
                                        
                                        <td>
                                            <select class="form-control form-control-sm" name="delivery_condition[]" tabindex="1">
                                                <option value="0" selected="">With Carrying</option>
                                                <option value='1'>Without Carrying</option>
                                            </select>
                                        </td>
                                        
                                        <td><input type="text" name="required_time[]" placeholder="Required Time" class="form-control"></td>
                                        <td><input type="text" name="supplier_remarks[]" placeholder="Remarks" class="form-control"></td>
                                        <td><button type="button" class="supplier_remove">-</button></td>
                                    </tr>
                                `;
                
                                $("#suppliers-table").append(row);
                            });
                
                            // Remove row button click events
                            $(document).on("click", ".supplier_remove", function () {
                                $(this).closest("tr.supplier-field").remove();
                            });
                        });
                        
        </script>

        <script>
            $(document).ready(function() {
            $('#getDataButton').on('click', function() {
            $('.mySelect').each(function() {
            var selectedOption = $(this).find('option:selected');
            var selectedText = selectedOption.text();
            var selectedValue = selectedOption.val();
              
            var materialCell = `
            <tr>
            <td>
                <select class="form-control form-control-sm" name="materialSelected[]">
                    <option value=${selectedValue} selected="">${selectedText} </option>
            
                </select>
            </td></tr>`;
        
            $('#cs-details-table tbody').append(materialCell);
            });

                $('.mySupplierSelect').each(function() {
                var selectedOption = $(this).find('option:selected');
                var selectedText = selectedOption.text();
                var selectedValue = selectedOption.val();
            
                var supplierCell = `
                    <th>
                        <select class="form-control form-control-sm" name="supplierSelected[]">
                            <option value=${selectedValue} selected="">${selectedText} </option>
                        </select>
                    </th>`;
                
                    $('#cs-details-table thead tr').append(supplierCell);
                    });

                var numHeaders = $('#cs-details-table thead th').length;
                var numCellsToAdd = numHeaders; // Number of cells to add at once
              
                    $('#cs-details-table tbody tr').each(function() {
                    var existingCells = $(this).find('td').length;
                    var cellsToAdd = Math.min(numCellsToAdd, numHeaders - existingCells);
                
                    for (var i = 0; i < cellsToAdd; i++) {
                        
                        var inputField = $('<input>').attr({
                            'type': 'text',
                            'placeholder': "Rate",
                            'name': "rates[]"
                            }); 
                            $(this).append($('<td>').append(inputField));
                        } }); 
                });
                });
        </script>
    </body>

</html>