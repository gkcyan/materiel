<div class="row">
	<a href="{{ URL::to('/student/pdf') }}">Export PDF</a>
    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            
        </tr>
        @foreach ($cuves as $cuve)
        <tr>
            <td>{{ $cuve->cuve }}</td>
            <td>{{ $cuve->capacite }}</td>
            
        </tr>
        @endforeach
    </table>
</div>