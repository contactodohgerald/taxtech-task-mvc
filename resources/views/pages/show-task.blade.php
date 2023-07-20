<x-app-layout>

    <main id="main">
        <section id="specials" class="specials">
            <div class="container">
                <div class="card mt-5">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <p>
                                    <label class="control-label">Task Name: </label>
                                    <span> {{$task->data ? Str::ucfirst($task->data->name) : 'N/A'  }} </span>
                                </p>
                            </div>

                            <div class="col-lg-12">
                                <p> 
                                    <label class="control-label">Due Date: </label>
                                    <span> {{$task->data ?\Carbon\Carbon::parse($task->data->due_date)->format('jS F Y') : 'N/A'  }} </span>
                                </p>
                            </div>

                            <div class="col-lg-12">
                                <p>
                                    <label class="control-label">Priority: </label>
                                    <span> {{$task->data ? Str::ucfirst($task->data->priority) : 'N/A'  }} </span>
                                </p>
                            </div>

                            <div class="col-lg-12">
                                <p>
                                    <span> {{$task->data ? $task->data->description : 'N/A'  }} </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

</x-app-layout>
