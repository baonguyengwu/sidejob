
// Applied Jobs section
const save = document.querySelector('.save span');
const jobs = document.querySelectorAll('.job');
const savedJobs = document.querySelector('.saved-jobs .table tbody'); // get el to fill

const btnCheckout = document.querySelector('.btn-checkout'); // clear applied jobs

// add to applied jobs
function addJob() {
	const pid = this.dataset.pid;
	const parent = this.parentNode;
	const jobBody = parent.parentNode;

	const title = jobBody.querySelector('.card-title').innerHTML;
	const salary = parent.querySelector('.salary').innerHTML;
	const company = jobBody.querySelector('.company').innerHTML;


	let job = JSON.parse(localStorage.getItem('genesJobs')) || [];

	const item = {
		p_id: pid,
		title,
		company,
		salary
	};

	let productExists = false;
	// check if a product already exist in the save
	for (let i = 0; i < job.length; i++) {
		if (job[i]['p_id'] === pid) {
			productExists = true;
			break;
		}
	}

	if (!productExists) {
		job.push(item);
	}

	localStorage.setItem('genesJobs', JSON.stringify(job));
	save.textContent = ' ' + job.length;
}

// get from save and display on table
function populate() { // get items on page load
	let job = JSON.parse(localStorage.getItem('genesJobs')) || 0;

	if (job) save.textContent = job.length + ' ';

	if (!savedJobs || job == 0) return;

	job.forEach(function (p) { // fill the save jobs

		const el = document.createElement('tr');
		el.innerHTML = (` 
			<th>${p.p_id}</th>
			<td>${p.title}</td>
			<td>${p.company}</td>
			<td>${p.salary}</td>
		`);
		savedJobs.appendChild(el);
	});

};

populate();

jobs.forEach(function (element) {
	btnAdd = element.querySelector('.save-button');
	btnAdd.addEventListener('click', addJob)
});

function checkout(argument) {
	localStorage.removeItem('genesJobs');

	savedJobs.innerHTML = '';
	save.textContent = '0 ';
}

if (btnCheckout) {
	btnCheckout.addEventListener('click', checkout);
}