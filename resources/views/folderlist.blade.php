<x-public-layout>

<h1>List of Folders with Images</h1>

<div class="card-container">
    @foreach ($foldersWithImages as $folder)
        <div class="card">
            <h2>{{ $folder['folderName'] }}</h2>
            <img src="{{ $folder['imageUrl'] }}" alt="{{ $folder['folderName'] }} Image">
        </div>
    @endforeach
</div>
</x-public-layout>
