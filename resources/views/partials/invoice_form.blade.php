<link rel="stylesheet" href="https://icono-49d6.kxcdn.com/icono.min.css">

<form method="post" id="invoiceFormMain">
    @csrf
    <div class="mt-4">
        <p class="text-sm text-indigo-500">
            Bill From
        </p>
        <div class="mb-4 mt-5">
            <label for="from_street_address" class="text-gray-100 mt-5">Street
                Address</label>
            <input style="background-color: #1e2139" type="text" name="from_street_address" id="from_street_address"
                class="text-white mt-2 w-full p-2 rounded-sm @error('from_street_address') border-red-500 @enderror"
                value="{{ old('from_street_address') }}">
            @error('from_street_address')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <div class="grid grid-cols-3 gap-4">
        <div class="mt-2">
            <div>
                <label for="from_city" class="text-gray-100 mt-5">City</label>
                <input style="background-color: #1e2139" type="text" name="from_city" id="from_city"
                    class="mt-2 w-full p-2 rounded-sm text-white @error('from_city') border-red-500 @enderror"
                    value="{{ old('from_city') }}">
                @error('from_city')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="mt-2">
            <div>
                <label for="from_zip" class="text-gray-100 mt-5">Post Code</label>
                <input style="background-color: #1e2139" type="text" name="from_zip" id="from_zip"
                    class="mt-2 w-full p-2 rounded-sm text-white @error('from_zip') border-red-500 @enderror"
                    value="{{ old('from_zip') }}">
                @error('from_zip')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="mt-2">
            <div>
                <label for="from_country" class="text-gray-100 mt-5">Country</label>
                <input style="background-color: #1e2139" type="text" name="from_country" id="from_country"
                    class="mt-2 w-full p-2 rounded-sm text-white @error('from_country') border-red-500 @enderror"
                    value="{{ old('from_country') }}">
                @error('from_country')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="mt-5">
        <p class="text-sm text-indigo-500">
            Bill To
        </p>
        <div class="mb-4 mt-5">
            <label for="to_name" class="text-gray-100 mt-5">Client's Name</label>
            <input style="background-color: #1e2139" type="text" name="to_name" id="to_name"
                class="text-white mt-2 w-full p-2 rounded-sm @error('to_name') border-red-500 @enderror"
                value="{{ old('to_name') }}">
            @error('to_name')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-4 mt-5">
            <label for="to_email" class="text-gray-100 mt-5">Client's Email</label>
            <input style="background-color: #1e2139" type="text" name="to_email" placeholder="e.g. email@example.com"
                id="to_email" class="text-white mt-2 w-full p-2 rounded-sm @error('to_email') border-red-500 @enderror"
                value="{{ old('to_email') }}">
            @error('to_email')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-4 mt-5">
            <label for="to_street_address" class="text-gray-100 mt-5">Street Address</label>
            <input style="background-color: #1e2139" type="text" name="to_street_address" id="to_street_address"
                class="text-white mt-2 w-full p-2 rounded-sm @error('to_street_address') border-red-500 @enderror"
                value="{{ old('to_street_address') }}">
            @error('to_street_address')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="grid grid-cols-3 gap-4">
            <div class="mt-2">
                <div>
                    <label for="to_city" class="text-gray-100 mt-5">City</label>
                    <input style="background-color: #1e2139" type="text" name="to_city" id="to_city"
                        class="mt-2 w-full p-2 rounded-sm text-white @error('to_city') border-red-500 @enderror"
                        value="{{ old('to_city') }}">
                    @error('to_city')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="mt-2">
                <div>
                    <label for="to_zip" class="text-gray-100 mt-5">Post Code</label>
                    <input style="background-color: #1e2139" type="text" name="to_zip" id="to_zip"
                        class="mt-2 w-full p-2 rounded-sm text-white @error('to_zip') border-red-500 @enderror"
                        value="{{ old('to_zip') }}">
                    @error('to_zip')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="mt-2">
                <div>
                    <label for="to_country" class="text-gray-100 mt-5">Country</label>
                    <input style="background-color: #1e2139" type="text" name="to_country" id="to_country"
                        class="mt-2 w-full p-2 rounded-sm text-white @error('to_country') border-red-500 @enderror"
                        value="{{ old('to_country') }}">
                    @error('to_country')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="mt-2">
                <div>
                    <label for="issue_date" class="text-gray-100 mt-5">Issue Date</label>
                    <input style="background-color: #1e2139" type="text" name="issue_date" id="issue_date"
                        class="mt-2 w-full p-2 rounded-sm text-white @error('issue_date') border-red-500 @enderror"
                        value="{{ old('issue_date') }}">
                    @error('issue_date')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="mt-2">
                <div>
                    <label for="payment_terms" class="text-gray-100 mt-5">Payment
                        Terms</label>
                    <select style="background-color: #1e2139" type="text" name="payment_terms" id="payment_terms"
                        class="mt-2 w-full p-2 rounded-sm text-white @error('payment_terms') border-red-500 @enderror"
                        value="{{ old('payment_terms') }}">
                        <option value="1">Net 1 Day</option>
                        <option value="5">Net 5 Days</option>
                        <option value="7">Net 7 Days</option>
                        <option value="14">Net 14 Days</option>
                        <option value="30">Net 30 Days</option>
                        <option value="60">Net 60 Days</option>
                    </select>
                    @error('payment_terms')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>





        </div>
        <div class="mb-4 mt-5">
            <label for="project_description" class="text-gray-100 mt-5">Project
                Description</label>
            <input style="background-color: #1e2139" type="text" name="project_description"
                placeholder="e.g. Graphic Design Service" id="project_description"
                class="text-white mt-2 w-full p-2 rounded-sm @error('project_description') border-red-500 @enderror"
                value="{{ old('project_description') }}">
            @error('project_description')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
            @enderror
        </div>

        <h3 class="text-lg leading-6 font-medium text-white text-2xl" id="modal-title">
            Item List
        </h3>
        <div class="itemListContainer">
            <div class="flex-1 max-w-4xl mx-auto">
                <div class="grid grid-cols-12 gap-8">
                    <div class="mt-2 col-span-4 md:col-span-4">
                        <label for="item1_name" class="text-gray-100 mt-5">Item Name</label>
                        <input style="background-color: #1e2139" type="text" name="item1_name" id="item1_name"
                            class="mt-2 w-full p-2 rounded-sm text-white @error('item1_name') border-red-500 @enderror"
                            value="{{ old('item1_name') }}">
                        @error('item1_name')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mt-2 col-span-2 md:col-span-2">
                        <label for="item1_qty" class="text-gray-100 mt-5">Qty.</label>
                        <input style="background-color: #1e2139" type="text" name="item1_qty" id="item1_qty"
                            class="mt-2 w-full p-2 rounded-sm text-white @error('item1_qty') border-red-500 @enderror"
                            value="{{ old('item1_qty') }}">
                        @error('item1_qty')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
            
                    <div class="mt-2 col-span-3 md:col-span-3">
                        <label for="item1_price" class="text-gray-100 mt-5">Price</label>
                        <input style="background-color: #1e2139" type="text" name="item1_price" id="item1_price"
                            class="mt-2 w-full p-2 rounded-sm text-white @error('item1_price') border-red-500 @enderror"
                            value="{{ old('item1_price') }}">
                        @error('item1_price')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mt-2 col-span-2 md:col-span-2 text-white">
                        Total
                        <input disabled style="background-color: #0c0e16" type="text" name="item1_total" id="item1_total"
                            class="mt-2 w-full p-2 rounded-sm text-white dynamicTotal text-white" value="{{ old('item1_total') }}">
                    </div>
            
                    <div class="mt-10 col-span-1 md:col-span-1 text-white">
                        <span class="icono-trash text-white"></span>
                    </div>
        </div>

            </div>
            
        </div>

        <div class="mb-4 mt-5">
            <p class="addNewItem text-white px-4 py-3 font-medium w-full text-center" style="background-color: #1e2139;border-radius:10px;">+ Add New Item</p>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script>
        $("input#item1_qty").keyup(function(){
            if ( $('input#item1_price').length > 1) {
                calculateTotal();
            }
        });
        $("input#item1_price").keyup(function(){
            if ( $('input#item1_qty').length > 0) {
                calculateTotal();
            }
        });
        

        function calculateTotal() {
            let qty = $("input#item1_qty").val();
            let price = $("input#item1_price").val();
            let total = qty*price;
            $('input.dynamicTotal').val(`$${total}`)
        }
    </script>