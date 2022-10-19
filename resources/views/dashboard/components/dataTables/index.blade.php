<div class="table-responsive {{ $class ?? '' }}">
    <table class="table table-bordered" id="{{ $id }}" width="100%" cellspacing="0">
        <thead>
            <tr class="text-center fw-bold">
                @foreach ($th as $item)
                    <td>{{ $item }}</td>
                @endforeach
            </tr>
        </thead>
        <tbody class="border">

        </tbody>
    </table>
</div>

@push('styles')
    <style>
        tbody td {
            border: 1px solid #dee2e6 !important;
        }
    </style>
@endpush
