
<x-app-layout>

    <main id="main">
        <section id="specials" class="specials">
            <div class="container">

                <div class="section-title">
                    <h2>Update <span>Task</span></h2>

                    <div class="row mt-5">
                        <div class="col-lg-6 offset-lg-3">
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />

                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <form action="{{ route('todo.tasks.update', $task->data->_id) }}" method="POST" class="row text-start">
                                @csrf
                                @method('PUT')
                                <div class="form-group col-lg-12">
                                    <x-label for="name" :value="__('Task Name')" />
                                    <x-input id="name" class="form-control" type="text" name="name"
                                        value="{{ $task->data->name }}" required autofocus />
                                </div>
                                <div class="form-group col-lg-12">
                                    <x-label for="due_date" :value="__('Due Date')" />
                                    <x-input id="due_date" class="form-control" type="datetime-local" name="due_date"
                                        value="{{ $task->data->due_date }}" required />
                                </div>
                                <div class="form-group col-lg-12">
                                    <x-label for="priority" :value="__('Priority')" />
                                    <select class="form-control" name="priority" id="priority">
                                        <option {{ $task->data->priority == 'high' ? 'selected' : ''}} value="high">High</option>
                                        <option {{ $task->data->priority == 'medium' ? 'selected' : ''}} value="medium">Medium</option>
                                        <option  {{ $task->data->priority == 'low' ? 'selected' : ''}} value="low">Low</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-12">
                                    <x-label for="description" :value="__('Description')" />
                                    <textarea id="description" class="form-control" name="description" required>
                                        {{ $task->data->description }}
                                    </textarea>
                                </div>
                                <div class="col-lg-12 text-center mt-4">
                                    <x-button class="ml-4 book-a-table-btn">
                                        {{ __('Update Task>>') }}
                                    </x-button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>

</x-app-layout>
