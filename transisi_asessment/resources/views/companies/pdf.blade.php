<style>
    table, td, th {
        border: 1px solid black;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }
    tr > th {
        font-size: 12px;
    }
    tr > td {
        padding: 5px;
        font-size: 16px;
        text-align: center;
        font-size: 10px;
        /* fonw */
    }
</style>
<table>
    <thead>
        <tr>
            <th>Name Company</th>
            <th>Email Company</th>
            <th>Website Company</th>
            <th>Name Employee</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $key)
            <tr>
                <td>{{ $key->name }}</td>
                <td>{{ $key->email }}</td>
                <td>{{ $key->website }}</td>
                <td>{{ $key->name_employee }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
{{-- @foreach ($data as $item)
    @if($item->employee->count())
        @foreach ($item->employee as $layanan)
            <tr>
                <td>{{ $layanan->name }}</td>
            </tr>
        @endforeach
    @endif
@endforeach --}}