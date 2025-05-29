<x-filament::page>
    <h2 class="text-xl font-bold mb-4">Ajouter une table pour : {{ $event->bride_name }} & {{ $event->groom_name }}</h2>

    <form wire:submit.prevent="create" class="space-y-4 mb-8">
        {{ $this->form }}
        <x-filament::button type="submit">Ajouter la table</x-filament::button>
    </form>

    <h2 class="text-xl font-bold mb-2">Tables existantes</h2>
    {{ $this->table }}
</x-filament::page>
