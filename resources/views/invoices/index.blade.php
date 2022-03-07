@extends('layouts.app')

@section('content')
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style>
    .invoiceStatus {
        border-radius: 5px;
        background-color: #cccccc;
        padding: 5px;
        text-align: center;
        margin: 0 20px;
    }
    div.invoiceStatus.paid {
        background-color:#1F2C3E;
    }
    div.invoiceStatus.paid span {
        color: #33D69F;
    }
    div.invoiceStatus.pending {
        background-color:#2B2735;
    }
    div.invoiceStatus.pending span {
        color: #FF8E00;
    }
    div.invoiceStatus.draft {
        background-color:#292C42;
    }
    div.invoiceStatus.draft span {
        color: #DEE3F9;
    }
    
    .filterGroups, .addNewItem, .deleteInvoice {
        cursor: pointer;
    }
</style>
<div class="flex justify-center">
    <div class="w-9/12 p-6 rounded-lg" style="background-color: #141625">
        <div class="mb-4 grid grid-cols-2 gap-4">
            <h1 class="text-white text-5xl">Invoices</h1>
            <div class="mb-4 grid grid-cols-2 gap-4 text-white">
                <select style="background-color: #1e2139" type="text" name="filter" id="filter"
                        class="mt-2 w-full p-2 rounded-sm text-white "
                        value="{{ old('filter') }}">
                        <option>Filter by Status</option>
                        <option value="all">All</option>
                        <option value="draft">Draft</option>
                        <option value="pending">Pending</option>
                        <option value="paid">Paid</option>
                    </select>
                <button type="submit"
                    class="text-white px-4 py-2 rounded font-medium  focus:outline-none openNewModal text-white text-sm py-2.5 px-5 mt-5 mx-5  rounded-md bg-green-500 hover:bg-green-600 hover:shadow-lg"" style="
                    background-color: #7c5dfa"> New Invoice</button>
            </div>

        </div>
        @if ($invoices->count())
        <p class="text-white">
            @foreach ($invoices as $invoice)
                    <div class="mb-4 rounded-lg text-white p-4 grid grid-cols-5 gap-3 filterGroups {{ $invoice->status }}" id="{{$invoice->invoice_id}}" style="background-color: #1F213A">
                    <div>
                            <p>#<span class="text-gray font-bold">{{$invoice->invoice_id}} </span></p>
                    </div>
                    <div>
                        <p>Due <span class="text-gray">{{$invoice->payment_due}} </span></p>
                    </div>
                    <div>
                        <p><span class="text-gray">{{$invoice->to_name}} </span></p>
                    </div>

                    <div>
                        <p><span class="text-gray font-bold">${{($invoice->item1_total)}} </span></p>
                    </div>

                    <div class="invoiceStatus {{ $invoice->status }}">
                        <span> &bull; {{$invoice->status}} </span>
                    </div>

                        {{-- <a href="" class="font-bold">{{ $invoice->user->name}}</a>
                        <span class="text-gray-600 text-sm">{{$invoice->created_at->diffForHumans()}}</span>
                        <p class="mb-2">{{ $invoice->from_street_address }}</p> --}}

                        {{-- <div class="flex items-center">
                            <form action="" method="post" class="mr-1">
                                @csrf
                                <button type="submit" class="text-blue-500">Like</button>
                            </form>
                            <form action="" method="post" class="mr-1">
                                <button type="submit" class="text-blue-500">Unlike</button>
                            </form>
                        </div> --}}
                    </div>
                @endforeach
        </p>
        @else
        <div class="flex justify-center mt-20">
            <img src="img/illustration-empty.svg">
        </div>
        <div class="flex justify-center text-white text-2xl">
            There is nothing here
        </div>
        <div class="mb-40 text-white text-sm text-center">
            <p> Create an invoice by clicking the</p>
            <p> <strong>New Invoice</strong> button and get started</p>
        </div>
    </div>
    @endif

    <div class="fixed z-10 inset-0 invisible overflow-y-auto" aria-labelledby="modal-title" role="dialog"
        aria-modal="true" id="newInvoiceModal">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity closeModal" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full">
                <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4" style="background-color: #0c0e16">
                    <div class="">

                        <div class="mt-3 mb-4 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-white text-4xl" id="modal-title">
                                New Invoice
                            </h3>

                            {{-- Invoice form --}}
                            @include('partials/invoice_form');  
                            {{-- ------------ --}}
                            
                        </div>
                    </div>
                </div>
                
                <div class="grid grid-cols-12 gap-8 pb-5" style="background-color: #0c0e16">
                <div class="float-left col-span-2 md:col-span-2">
                    <button type="button"
                        class="closeModal float-right bg-gray-500 text-white px-4 py-2 rounded font-medium">
                        Discard
                    </button>
                </div>
                    <div class="col-span-7 md:col-span-7">
                        <button type="submit" formaction="{{ route('save_draft') }}" class="float-right bg-gray-500 text-white px-4 py-2 rounded font-medium">Save as Draft</button>
                    </div>
                    <div class="col-span-3 md:col-span-3">
                        <button type="submit" class="bg-indigo-800 text-white px-4 py-2 rounded font-medium">Save & Send</button>
                    </div>
                </div>
            </form>


                    
                
            </div>
        </div>
    </div>
    

    <div class="fixed z-10 inset-0 invisible overflow-y-auto" aria-labelledby="modal-title" role="dialog"
        aria-modal="true" id="editInvoiceModal">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity closeModal" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full">
                <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4" style="background-color: #0c0e16">
                    <div class="">

                        <div class="mt-3 mb-4 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-white text-4xl" id="modal-title">
                                Edit Invoice <span class="invoiceIdEdit"></span>
                            </h3>

                            {{-- Invoice form --}}
                            @include('partials/invoice_form');  
                            {{-- ------------ --}}
                            
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-12 gap-8 pb-5" style="background-color: #0c0e16">
                    <div class="float-left col-span-2 md:col-span-2">
                        <button type="button"
                            class="closeModal float-right bg-gray-500 text-white px-4 py-2 rounded font-medium">
                            Discard
                        </button>
                    </div>
                        <div class="col-span-7 md:col-span-7">
                                <span class="deleteInvoice float-right bg-red-500 text-white px-4 py-2 rounded font-medium">Delete</span>
                        </div>
                        <div class="col-span-3 md:col-span-3">
                            <button formaction="{{ route('update_invoice') }}" type="submit" class="bg-indigo-800 text-white px-4 py-2 rounded font-medium">Save Changes</button>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {

            if (window.location.hash == '#validate') $('#newInvoiceModal').removeClass('invisible');
            
            $('.openNewModal').on('click', function (e) {
                $('#newInvoiceModal').removeClass('invisible');
            });
            $('.closeModal').on('click', function (e) {
                $('#newInvoiceModal').addClass('invisible');
                $('#editInvoiceModal').addClass('invisible');
            });
            $("#issue_date").datepicker();

            $('select#filter').change(function() {
                let filterStatus = $(this).val();
                $(`.filterGroups`).show();
                if (filterStatus == 'all') return;
                $(`.filterGroups:not(.${filterStatus})`).hide();
            });

            $(`.filterGroups`).click(function() {
                $('div#editInvoiceModal #invoiceFormMain').prepend(`<input type="hidden" id="invoice_id" name="invoice_id" value="${$(this).attr('id')}">`)
                const selectedInvoice = ({!! json_encode($invoices->toArray()) !!}).filter(invoice => invoice.invoice_id == $(this).attr('id'));
                $('#editInvoiceModal').removeClass('invisible');
                $('span.invoiceIdEdit').text($(this).attr('id'))
                
                Object.keys(selectedInvoice[0]).forEach(key => {
                    $(`div#editInvoiceModal input#${key}`).val(selectedInvoice[0][key]);
                });
            });

            $('.deleteInvoice').click(function() {
                console.log('delete this');
                const _token = $("input[name='_token']").val();
                $.ajax({
                    type:'POST',
                    url:`/delete_invoice`,
                    data:{_token, invoice_id: $(`.filterGroups`).attr('id')},
                    success:function(){
                        location.reload();
                    }
                });
            })
        });
    </script>
</div>
</div>
@endsection
