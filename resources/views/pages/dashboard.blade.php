<x-app-layout>

    <main id="main">
        <section id="specials" class="specials">
            <div class="container">

                <div class="section-title">
                    <h2>Create Your <span>Task</span></h2>

                    <div class="row mt-5">
                        <div class="col-lg-8 offset-lg-2">
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />

                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <form action="{{ route('todo.tasks.store') }}" method="POST" class="row">@csrf
                                <div class="form-group col-lg-4">
                                    <x-label for="name" :value="__('Task Name')" />
                                    <x-input id="name" class="form-control" type="text" name="name"
                                        :value="old('name')" required autofocus />
                                </div>
                                <div class="form-group col-lg-4">
                                    <x-label for="due_date" :value="__('Due Date')" />
                                    <x-input id="due_date" class="form-control" type="datetime-local" name="due_date"
                                        :value="old('due_date')" required />
                                </div>
                                <div class="form-group col-lg-4">
                                    <x-label for="priority" :value="__('Priority')" />
                                    <select class="form-control" name="priority" id="priority">
                                        <option value="high">High</option>
                                        <option selected value="medium">Medium</option>
                                        <option value="low">Low</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-12 text-start">
                                    <x-label for="description" :value="__('Description')" />
                                    <textarea id="description" class="form-control" name="description" :value="old('description')" required></textarea>
                                </div>
                                <div class="text-center mt-4">
                                    <input type="checkbox" name="reminder" value="reminder" id="reminder">
                                    <label for="reminder">Set Reminder</label>
                                    <x-button class="ml-4 book-a-table-btn">
                                        {{ __('Proceed>>') }}
                                    </x-button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <hr>
                    <div class="mt-3 left">
                        <a href="{{  route('todo.tasks.index') }}" class="ml-4 book-a-table-btn">
                            {{ __('View All Task') }}
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>

</x-app-layout>
