<x-filament-panels::page>
    <div class="mx-auto w-full max-w-5xl">
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-bold text-gray-950 dark:text-white">
                Mariage de {{ $event->groom_name }}
                & {{ $event->bride_name }}
            </h1>

            <p class="mt-2 text-gray-500 dark:text-gray-400">
                Recherchez un invité avec son nom ou son code
            </p>

            <div class="no-print mb-6 flex justify-end" style="margin-bottom: 16px!important;">
                <button
                    type="button"
                    id="export-pdf"
                    class="rounded-lg bg-primary-600 px-5 py-3 font-semibold text-white
               shadow hover:bg-primary-500"
                >
                    📄 Exporter en PDF
                </button>
            </div>
        </div>

        <div class="sticky top-4 z-10 mb-8" style="margin-bottom: 32px!important;">
            <input
                id="guest-search"
                type="search"
                placeholder="Rechercher un nom ou un code..."
                autocomplete="off"
                class="w-full rounded-xl border-gray-300 bg-white px-5 py-4
                       text-lg shadow-lg outline-none focus:border-primary-500
                       focus:ring-primary-500 dark:border-gray-700
                       dark:bg-gray-900 dark:text-white"
            >
        </div>

        <div id="print-area">
            <div id="tables-container" class="space-y-6">
                @forelse($tables as $table)
                    <section
                        class="guest-table overflow-hidden rounded-xl bg-white shadow
                               dark:bg-gray-900"
                    >
                        <header class="bg-primary-600 px-6 py-4 text-white">
                            <h2 class="text-2xl font-bold uppercase">
                                Table {{ $table->name }}
                            </h2>
                        </header>

                        <div class="divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse($table->guestTables as $invitation)
                                @if($invitation->guest)
                                    <div
                                        class="guest-row flex flex-col justify-between
                                               gap-2 px-6 py-4 sm:flex-row sm:items-center"
                                        data-search="{{ Str::lower(
                                            $invitation->guest->name . ' ' .
                                            $invitation->code
                                        ) }}"
                                    >
                                        <span class="text-lg font-semibold text-gray-950 dark:text-white">
                                            {{ $invitation->guest->name }}
                                        </span>

                                        <span class="font-mono text-primary-600 dark:text-primary-400">
                                            {{ $invitation->code }}
                                        </span>
                                    </div>
                                @endif
                            @empty
                                <p class="empty-table px-6 py-5 text-gray-500">
                                    Aucun invité assigné à cette table.
                                </p>
                            @endforelse
                        </div>
                    </section>
                @empty
                    <div class="rounded-xl bg-white p-8 text-center shadow dark:bg-gray-900">
                        Aucune table disponible.
                    </div>
                @endforelse
            </div>
        </div>

        <div
            id="no-results"
            class="hidden rounded-xl bg-white p-10 text-center shadow dark:bg-gray-900"
        >
            <p class="text-xl font-semibold text-gray-950 dark:text-white">
                Aucun invité trouvé
            </p>

            <p class="mt-2 text-gray-500">
                Vérifiez le nom ou le code saisi.
            </p>
        </div>
    </div>

    <style>
        @media print {
            @page {
                size: A4 portrait;
                margin: 12mm;
            }

            body * {
                visibility: hidden;
            }

            #print-area,
            #print-area * {
                visibility: visible;
            }

            #print-area {
                position: absolute;
                inset: 0;
                width: 100%;
                color: #111827;
            }

            .no-print {
                display: none !important;
            }

            .guest-table {
                break-inside: avoid;
                page-break-inside: avoid;
                margin-bottom: 12px !important;
                border: 1px solid #d1d5db;
                box-shadow: none !important;
            }

            .guest-table header {
                padding: 7px 12px !important;
                background-color: #2563eb !important;
                color: white !important;

                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            .guest-table header h2 {
                font-size: 15px !important;
                line-height: 20px !important;
            }

            .guest-row {
                display: flex !important;
                flex-direction: row !important;
                align-items: center !important;
                justify-content: space-between !important;
                padding: 5px 12px !important;
                font-size: 10px !important;
                line-height: 14px !important;
            }

            .guest-row span {
                font-size: 10px !important;
            }

            .hidden {
                display: none !important;
            }
        }
    </style>


    <script>
        (() => {
            const searchInput = document.getElementById('guest-search');
            const exportButton = document.getElementById('export-pdf');
            const tables = document.querySelectorAll('.guest-table');
            const noResults = document.getElementById('no-results');

            const normalize = (value) => {
                return value
                    .toLowerCase()
                    .normalize('NFD')
                    .replace(/[\u0300-\u036f]/g, '')
                    .trim();
            };

            const filterGuests = () => {
                const search = normalize(searchInput.value);
                let totalMatches = 0;

                tables.forEach((table) => {
                    const guests = table.querySelectorAll('.guest-row');
                    const emptyMessage = table.querySelector('.empty-table');
                    let tableMatches = 0;

                    guests.forEach((guest) => {
                        const value = normalize(guest.dataset.search || '');
                        const matches = search === '' || value.includes(search);

                        guest.classList.toggle('hidden', !matches);

                        if (matches) {
                            tableMatches++;
                            totalMatches++;
                        }
                    });

                    if (emptyMessage) {
                        emptyMessage.classList.toggle('hidden', search !== '');
                    }

                    table.classList.toggle(
                        'hidden',
                        search !== '' && tableMatches === 0
                    );
                });

                noResults.classList.toggle(
                    'hidden',
                    search === '' || totalMatches > 0
                );
            };

            searchInput?.addEventListener('input', filterGuests);

            exportButton?.addEventListener('click', () => {
                // Réaffiche toute la liste avant l’exportation.
                searchInput.value = '';
                filterGuests();

                window.print();
            });

            searchInput?.focus();
        })();
    </script>

    <script>
        (() => {
            const searchInput = document.getElementById('guest-search');
            const tables = document.querySelectorAll('.guest-table');
            const noResults = document.getElementById('no-results');

            if (!searchInput) {
                return;
            }

            const normalize = (value) => {
                return value
                    .toLowerCase()
                    .normalize('NFD')
                    .replace(/[\u0300-\u036f]/g, '')
                    .trim();
            };

            searchInput.addEventListener('input', function () {
                const search = normalize(this.value);
                let totalMatches = 0;

                tables.forEach((table) => {
                    const guests = table.querySelectorAll('.guest-row');
                    const emptyMessage = table.querySelector('.empty-table');
                    let tableMatches = 0;

                    guests.forEach((guest) => {
                        const searchableValue = normalize(
                            guest.dataset.search || ''
                        );

                        const matches =
                            search === '' ||
                            searchableValue.includes(search);

                        guest.classList.toggle('hidden', !matches);

                        if (matches) {
                            tableMatches++;
                            totalMatches++;
                        }
                    });

                    if (emptyMessage) {
                        emptyMessage.classList.toggle(
                            'hidden',
                            search !== ''
                        );
                    }

                    table.classList.toggle(
                        'hidden',
                        search !== '' && tableMatches === 0
                    );
                });

                noResults.classList.toggle(
                    'hidden',
                    search === '' || totalMatches > 0
                );
            });

            searchInput.focus();
        })();
    </script>
</x-filament-panels::page>
