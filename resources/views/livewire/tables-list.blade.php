<div>
    @foreach($tables as $table)
        <div class="mb-2 p-3 border rounded">
            <strong>{{ $table->name }}</strong> — {{ $table->capacity }} places
        </div>
    @endforeach
</div>
