<x-app-layout>

    <main id="main">
        <section id="specials" class="specials">
            <div class="container">
                <div class="section-title">
                    <h2>Your <span>Task</span></h2>
                    <div class="row">
                        @forelse ($tasks->data as $data_item)
                            <div class="col-12 col-md-6">
                                <div class="card shadow">
                                   <div class="card-body">
                                    <h2> <a href="{{ route('todo.tasks.show', $data_item->_id) }}">  {{ ucfirst($data_item->name) }} </a></h2>
                                    <div>
                                         <b>
                                             <span class="text-danger">Due Date:</span>
                                             {{ \Carbon\Carbon::parse($data_item->due_date)->format('jS F Y') }}
                                         </b>   
                                         /   
                                         <b>
                                             <span class="text-danger">Priority:</span>
                                             {{ ucfirst($data_item->priority) }}
                                         </b>
                                     </div>
                                    
                                     <div class="d-flex justify-content-between align-items-center">
                                         <span class="card-text">
                                             <span class="bx bx-calendar-event"></span>
                                             <span class="small">
                                                 Created
                                                 {{ \Carbon\Carbon::parse($data_item->createdAt)->format('jS F Y') }}
                                             </span>
                                         </span>    
                                         <div class="btn-group flex gap-2">
                                             <a title="Edit" class="btn btn-secondary btn-icon dropdown-item inline-block" href="{{route('todo.tasks.edit', $data_item->_id) }}">
                                                 <i class="bx bxs-edit text-warning" style="opacity:80%"></i>
                                             </a>
                                             <form method="POST" action="{{route('todo.tasks.destroy', $data_item->_id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button title="Delete" class="btn btn-secondary btn-icon dropdown-item inline-block">
                                                    <i class="bx bxs-trash-alt text-danger" style="opacity:80%"></i>
                                                </button>
                                             </form>
                                         </div>
                                     </div>
                                 </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-lg-12">
                                <p>You have no tasks available at the moment. Try adding some!</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </section>
    </main>

</x-app-layout>
