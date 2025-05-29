<x-filament::page>
    <div class="space-y-6 mt-6">
        <form wire:submit.prevent="create" class="space-y-4">
            {{ $this->form }}

            <x-filament::button type="submit">
                Ajouter l'invité
            </x-filament::button>
        </form>

        {{ $this->table }}
    </div>
</x-filament::page>
