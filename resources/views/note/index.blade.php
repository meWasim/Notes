<x-app-layout>
    <x-slot name='title'>Index</x-slot>
    <div class="note-container py-12">
        <a href="{{route('note.create')}}" class="new-note-btn">New Note</a>
    </div>
    <div class="notes">
        @foreach ($notes as $note)
        <div class="note" data-url="{{ route('note.show', ['note' => $note->id]) }}">
            <div class="note-body">
                {{Str::words($note->note,30)}}
            </div>
            <div class="note-buttons">
                <a href="{{route('note.edit',$note)}}" class="note-edit-button">Edit</a>
                <form action="{{route('note.destroy',$note)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="note-delete-button">Delete</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.note').forEach(note => {
                note.addEventListener('click', function() {
                    const url = this.getAttribute('data-url');
                    window.location.href = url;
                });
            });
        });
    </script>

    <div class="p-6">
        {{$notes->links()}}
    </div>
</x-app-layout>