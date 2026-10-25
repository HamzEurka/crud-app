import { useState } from "react"

function ToDoList() {
    const [tasks, setTasks] = useState(["kkllk", "jjkj", ""]);
    const [NewTask, setNewTask] = useState("");

    function handelinputTask(event) {
        setNewTask(event.target.value);
    }

    function addtask() {
        if (NewTask.trim() !== "") {
            setTasks([...tasks, NewTask.trim()]);
            setNewTask("");
        }
    }

    function deletetask(index) {
        const updatedTasks = tasks.filter((_, i) => i !== index);
        setTasks(updatedTasks);
    }

    function movetaskup(index) {
        if (index > 0) {
            const updatedTasks = [...tasks];
            [updatedTasks[index], updatedTasks[index - 1]] = [updatedTasks[index - 1], updatedTasks[index]];
            setTasks(updatedTasks);
        }
    }

    function movetaskdown(index) {
        if (index < tasks.length - 1) {
            const updatedTasks = [...tasks];
            [updatedTasks[index], updatedTasks[index + 1]] = [updatedTasks[index + 1], updatedTasks[index]];
            setTasks(updatedTasks);
        }
    }

    return (
        <div className="todo-wrapper">
            <div className="todo-card">
                <h1 className="todo-title">To-Do List</h1>

                <div className="todo-input-row">
                    <input
                        type="text"
                        className="todo-input"
                        placeholder="Enter a task ....."
                        value={NewTask}
                        onChange={handelinputTask}
                    />
                    <button className="btn btn-add" onClick={addtask}>
                        Add
                    </button>
                </div>

                <ol className="todo-list">
                    {tasks.map((task, index) =>
                        <li key={index} className="todo-item">
                            <span className="todo-text">{task}</span>
                            <div className="todo-actions">
                                <button className="btn btn-delete" onClick={() => deletetask(index)}>
                                    Delete
                                </button>
                                <button className="btn btn-move" onClick={() => movetaskup(index)}>
                                    Up
                                </button>
                                <button className="btn btn-move" onClick={() => movetaskdown(index)}>
                                    Down
                                </button>
                            </div>
                        </li>
                    )}
                </ol>
            </div>
        </div>
    )
}

export default ToDoList