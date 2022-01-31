<div class="table-responsive">
    <table class="table text-nowrap">
        <thead>
        <tr>
            <th>#Invoice</th>

            <th >Paid Via</th>
            <th>Amount</th>
            <th>Date</th>
            <th class="text-center" style="width: 10%;"><i class="icon-arrow-down12"></i></th>
        </tr>
        </thead>
        <tbody>
        <tr class="table-active table-border-double">
            <td colspan="4">Patient's Invoices</td>

            <td class="text-right"> @if(isset($invoices) && $invoices->count() > 0)
                    <span class="badge bg-danger badge-pill">{!! $invoices->count() !!}</span> @endif
            </td>

        </tr>

        @if(isset($invoices) && $invoices->count() > 0)
            @foreach($invoices as $invoice)
                <tr>
                    <td>{!! str_pad($invoice->id,6,0,STR_PAD_LEFT) !!}</td>

                    <td>@if($invoice->paid_via=="Case") Cash @else <span class="badge bg-danger badge-pill">{!! $invoice->paid_via !!}</span> {!! $invoice->other_payment_info !!}  @endif</td>
                    <td>$ {!! number_format($invoice->total_amount,2) !!} </td>
                    <td>{!! \App\Helpers\CommonMethods::formatDate($invoice->created_at) !!} </td>
                    <td>
                        <a href="#!" class="download-session-items" data-appointment-id="{!! $invoice->appointment_id !!}"><i class="icon-download font-size-lg"></i> </a>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>

    </table>
</div>