document.querySelectorAll(".confirmRemove").forEach(el => el.addEventListener("click", confirmRemove));

function confirmRemove(event) {
    console.log(event);
    if (confirm('Do you really want to remove ' + this.dataset.title + '?')) {
        return;
    }
    event.preventDefault();
    return false;
}

document.querySelectorAll(".confirmQuestionRemove").forEach(el => el.addEventListener("click", confirmQuestionRemove));

function confirmQuestionRemove(event) {
    console.log(event);
    if (confirm('Do you really want to remove this question?')) {
        return;
    }
    event.preventDefault();
    return false;
}

document.querySelectorAll(".isLink").forEach(el => el.addEventListener("click", makeLinkable));

function makeLinkable() {
    document.location.href = this.dataset.href;
}

document.querySelectorAll(".submit-form").forEach(el => el.addEventListener("click", submitEditForm));

function submitEditForm() {
    this.closest('.modal')?.querySelector('form')?.submit();
}

// Edit Sets
document.querySelectorAll(".set-edit-wrapper").forEach(el => el.addEventListener("click", getSetData));

async function getSetData() {
    const setIdEdit = document.querySelector('#set-id-edit');
    const loader = document.querySelector('#loader');
    const modalBody = document.querySelector('#editSetModal .edit-form');
    const clone = document.importNode(setIdEdit.content, true);
    modalBody.innerHTML = '';
    setTimeout(() => {
        loader.style.opacity = "1";
    }, 300);
    loader.style.display = 'block';

    const request = await fetch("/getSet.php?set_id=" + this.dataset.set_id);
    const data = await request.json();
    setTimeout(() => {
        loader.style.opacity = "0";
    }, 300);
    loader.style.display = 'none';

    clone.querySelector('[name=\'ed_id\']').value = data.id;
    clone.querySelector('[name=\'ed_ordering\']').value = data.ordering;
    clone.querySelector('[name=\'ed_title\']').value = data.title;

    modalBody.appendChild(clone);
}

// Edit Topics
document.querySelectorAll(".topic-edit-wrapper").forEach(el => el.addEventListener("click", getTopicData));

async function getTopicData(event) {
    event.stopPropagation();
    const topicIdEdit = document.querySelector('#topic-id-edit');
    const loader = document.querySelector('#loader-edit-topic');
    const modalBody = document.querySelector('#editTopicModal .topic-edit-form');
    const clone = document.importNode(topicIdEdit.content, true);
    modalBody.innerHTML = '';

    setTimeout(() => {
        loader.style.opacity = "1";
    }, 300);
    loader.style.display = 'block';

    const request = await fetch("/getTopic.php?topic_id=" + this.dataset.topic_id);
    const data = await request.json();

    const request2 = await fetch("/getAllSetTitles.php");
    const data2 = await request2.json();

    setTimeout(() => {
        loader.style.opacity = "0";
    }, 300);
    loader.style.display = 'none';

    clone.querySelector('[name=\'ed_topic_id\']').value = data.id;
    const relatedSet = clone.querySelector('[name=\'ed_topic_relset\']');
    for (let s of data2) {
        let option = document.createElement("option");
        option.value = s.id;
        option.innerText = s.title;
        relatedSet.appendChild(option);
    }
    relatedSet.value = data.q_set_id;
    clone.querySelector('[name=\'ed_topic_ordering\']').value = data.ordering;
    clone.querySelector('[name=\'ed_topic_title\']').value = data.title;

    modalBody.appendChild(clone);
}

// Edit Questions
document.querySelectorAll(".question-edit-wrapper").forEach(el => el.addEventListener("click", getQuestionData));

async function getQuestionData(event) {
    event.stopPropagation();
    const questionIdEdit = document.querySelector('#question-id-edit');
    const loader = document.querySelector('#loader-edit-question');
    const modalBody = document.querySelector('#editQuestionModal .question-edit-form');
    const clone = document.importNode(questionIdEdit.content, true);
    modalBody.innerHTML = '';
    setTimeout(() => {
        loader.style.opacity = "1";
    }, 300);
    loader.style.display = 'block';

    const request = await fetch("/getQuestion.php?question_id=" + this.dataset.question_id);
    const data = await request.json();

    const request2 = await fetch("/getAllTopicTitles.php?set_id=" + this.dataset.set_id); // ?set_id= ... dataset
    const data2 = await request2.json();

    setTimeout(() => {
        loader.style.opacity = "0";
    }, 300);
    loader.style.display = 'none';

    clone.querySelector('[name=\'ed_question_id\']').value = data.id;
    const relatedTopic = clone.querySelector('[name=\'ed_question_reltopic\']');
    for (let s of data2) {
        let option = document.createElement("option");
        option.value = s.id;
        option.innerText = s.title;
        relatedTopic.appendChild(option);
    }
    relatedTopic.value = data.topic_id;
    clone.querySelector('[name=\'ed_question_ordering\']').value = data.ordering;
    clone.querySelector('[name=\'ed_question_type\']').value = data.question_type;
    clone.querySelector('[name=\'ed_question_text\']').value = data.question_text;
    clone.querySelector('[name=\'ed_goto_default\']').value = data.goto_default;

    modalBody.appendChild(clone);
}

// Edit Possible Answers
document.querySelectorAll(".possible-answers-edit-wrapper").forEach(el => el.addEventListener("click", getPossibleAnswersData));

async function getPossibleAnswersData(event) {
    event.stopPropagation();
    const possibleAnswersIdEdit = document.querySelector('#possible-answers-id-edit');
    const loader = document.querySelector('#loader-edit-possible-answers');
    const modalBody = document.querySelector('#editPossibleAnswersModal .possible-answers-edit-form');
    const clone = document.importNode(possibleAnswersIdEdit.content, true);
    modalBody.innerHTML = '';
    setTimeout(() => {
        loader.style.opacity = "1";
    }, 300);
    loader.style.display = 'block';

    const request = await fetch("/getQuestion.php?question_id=" + this.dataset.question_id);
    const data = await request.json();

    const request2 = await fetch("/getAllTopicTitles.php?set_id=" + this.dataset.set_id); // ?set_id= ... dataset
    const data2 = await request2.json();

    setTimeout(() => {
        loader.style.opacity = "0";
    }, 300);
    loader.style.display = 'none';

    clone.querySelector('[name=\'ed_question_id\']').value = data.id;
    const relatedTopic = clone.querySelector('[name=\'ed_question_reltopic\']');
    for (let s of data2) {
        let option = document.createElement("option");
        option.value = s.id;
        option.innerText = s.title;
        relatedTopic.appendChild(option);
    }
    relatedTopic.value = data.topic_id;
    clone.querySelector('[name=\'ed_question_ordering\']').value = data.ordering;
    clone.querySelector('[name=\'ed_question_type\']').value = data.question_type;
    clone.querySelector('[name=\'ed_question_text\']').value = data.question_text;
    clone.querySelector('[name=\'ed_goto_default\']').value = data.goto_default;

    modalBody.appendChild(clone);
}

document.querySelector(".new-pa").addEventListener("click", getPossibleAnswerAddData);

async function getPossibleAnswerAddData(event) {
    event.stopPropagation();
    const possibleAnswersIdAdd = document.querySelector('#add-possible-answer-id');
    const loader = document.querySelector('#loader-add-possible-answers');
    const modalBody = document.querySelector('#addPossibleAnswersModal .possible-answers-add-form');
    const clone = document.importNode(possibleAnswersIdAdd.content, true);
    modalBody.innerHTML = '';
    setTimeout(() => {
        loader.style.opacity = "1";
    }, 300);
    loader.style.display = 'block';

    const request = await fetch("/getAllQuestionsTitles.php?topic_id=" + this.dataset.topic_id);
    const data = await request.json();

    console.log(this.dataset.topic_id);
    // const request2 = await fetch("/getAllTopicTitles.php?set_id=" + this.dataset.set_id); // ?set_id= ... dataset
    // const data2 = await request2.json();

    setTimeout(() => {
        loader.style.opacity = "0";
    }, 300);
    loader.style.display = 'none';

    clone.querySelector('[name=\'add_possible_answer_id\']').value = data.id;

    const relatedQuestion = clone.querySelector('[name=\'rel_pa\']');
    const gotoQuestion = clone.querySelector('[name=\'pa_goto\']');
    relatedQuestion.addEventListener("change", changeGotoQuestion(data, gotoQuestion));
    console.log(relatedQuestion);
    for (let q of data) {
        let option = document.createElement("option");
        option.value = q.id;
        option.innerText = q.question_text;
        relatedQuestion.appendChild(option);
    }
    relatedQuestion.value = data.topic_id;

    modalBody.appendChild(clone);
}

function changeGotoQuestion(data, gotoQuestion) {
    return (event) => {
        for (let i = gotoQuestion.childNodes.length - 1; i >= 0; --i) {
            gotoQuestion.childNodes[i].remove();
        }
        for (let q of data) {
            console.log(event.target.value, q.id, q.id == event.target.value);
            if(q.id == event.target.value)
                continue;
            let option = document.createElement("option");
            option.value = q.id;
            option.innerText = q.question_text;
            gotoQuestion.appendChild(option);
        }
        gotoQuestion.value = data.topic_id;
    }
}