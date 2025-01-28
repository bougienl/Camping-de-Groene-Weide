document.addEventListener('DOMContentLoaded', function () {
    const calendarGrid = document.getElementById('calendar-grid');
    const currentMonthElement = document.getElementById('current-month');
    const prevMonthButton = document.getElementById('prev-month');
    const nextMonthButton = document.getElementById('next-month');
    const activitiesList = document.getElementById('activities-list');

    let currentDate = new Date();
    let currentMonth = currentDate.getMonth();
    let currentYear = currentDate.getFullYear();
    let rangeStart = null;
    let rangeEnd = null;

    // Generate some sample activities
    const activities = {
        '2025-06-15': ['Sprookjestocht - 10:00 AM', 'Sprookjestocht - 2:00 PM'],
        '2025-06-18': ['Sprookjestocht - 11:00 AM'],
        '2025-06-20': ['Sprookjestocht - 3:00 PM'],
        '2025-06-25': ['Sprookjestocht - 5:00 PM'],
    };

    function renderCalendar(month, year) {
        calendarGrid.innerHTML = '';
        currentMonthElement.textContent = `${new Date(year, month).toLocaleString('default', { month: 'long' })} ${year}`;
    
        // Add day names if not already added
        if (!document.querySelector('.calendar-day-names')) {
            const dayNames = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
            const dayNamesRow = document.createElement('div');
            dayNamesRow.classList.add('calendar-day-names');
            dayNames.forEach(day => {
                const dayElement = document.createElement('div');
                dayElement.textContent = day;
                dayNamesRow.appendChild(dayElement);
            });
            calendarGrid.parentElement.insertBefore(dayNamesRow, calendarGrid);
        }
    
        const firstDayOfMonth = new Date(year, month, 1);
        const daysInMonth = new Date(year, month + 1, 0).getDate();
        const startingDay = firstDayOfMonth.getDay();
        const totalCells = 35;
    
        // Get the last few days of the previous month
        const prevMonthDays = new Date(year, month, 0).getDate();
        for (let i = startingDay - 1; i >= 0; i--) {
            const dayElement = document.createElement('div');
            dayElement.classList.add('calendar-day', 'other-month');
            dayElement.textContent = prevMonthDays - i;
            calendarGrid.appendChild(dayElement);
        }
    
        // Add the days of the current month
        for (let i = 1; i <= daysInMonth; i++) {
            const dayElement = document.createElement('div');
            dayElement.classList.add('calendar-day');
            dayElement.textContent = i;
    
            const dateStr = `${year}-${String(month + 1).padStart(2, '0')}-${String(i).padStart(2, '0')}`;
            if (dateStr === rangeStart || dateStr === rangeEnd) {
                dayElement.classList.add('selected');
            } else if (rangeStart && rangeEnd && new Date(dateStr) > new Date(rangeStart) && new Date(dateStr) < new Date(rangeEnd)) {
                dayElement.classList.add('selected-range');
            }
    
            dayElement.addEventListener('click', () => handleDateSelection(dateStr));
            calendarGrid.appendChild(dayElement);
        }
    
        // Fill the remaining cells with the next month's days
        const remainingCells = totalCells - (startingDay + daysInMonth);
        for (let i = 1; i <= remainingCells; i++) {
            const dayElement = document.createElement('div');
            dayElement.classList.add('calendar-day', 'other-month');
            dayElement.textContent = i;
            calendarGrid.appendChild(dayElement);
        }
    }
    
    // Function to format date as YYYY-MM-DD
    function formatDate(date) {
        return `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, '0')}-${String(date.getDate()).padStart(2, '0')}`;
    }
    function isInRange(date) {
        if (!rangeStart || !rangeEnd) return false;
        const current = new Date(date);
        return current >= new Date(rangeStart) && current <= new Date(rangeEnd);
    }

    function handleDateSelection(date) {
        if (!rangeStart || (rangeStart && rangeEnd)) {
            rangeStart = date;
            rangeEnd = null;
        } else {
            rangeEnd = date;

            if (new Date(rangeStart) > new Date(rangeEnd)) {
                [rangeStart, rangeEnd] = [rangeEnd, rangeStart];
            }
        }

        renderCalendar(currentMonth, currentYear);
        showActivitiesForRange();
    }

    function showActivitiesForRange() {
        activitiesList.innerHTML = '';
    
        if (!rangeStart || !rangeEnd) {
            const noRangeBox = document.createElement('div');
            noRangeBox.classList.add('select-date-range');
            noRangeBox.textContent = 'Select a date range to view activities.';
            activitiesList.appendChild(noRangeBox);
            return;
        }
    
        const start = new Date(rangeStart);
        const end = new Date(rangeEnd);
        let hasActivities = false;
    
        for (let d = start; d <= end; d.setDate(d.getDate() + 1)) {
            const dateStr = `${d.getFullYear()}-${String(d.getMonth() + 1).padStart(2, '0')}-${String(d.getDate()).padStart(2, '0')}`;
            if (activities[dateStr]) {
                hasActivities = true;
                activities[dateStr].forEach(activity => {
                    const activityItem = document.createElement('div');
                    activityItem.classList.add('activity-item');
    
                    // Create title (activity name)
                    const title = document.createElement('div');
                    title.classList.add('title');
                    title.textContent = activity.split(' - ')[0]; // Extract activity name
                    activityItem.appendChild(title);
    
                    // Create date
                    const date = document.createElement('div');
                    date.classList.add('date');
                    date.textContent = dateStr; // Use the formatted date
                    activityItem.appendChild(date);
    
                    // Create image (placeholder or actual image)
                    const image = document.createElement('img');
                    image.src = 'https://via.placeholder.com/250'; // Placeholder image URL
                    image.alt = activity; 
                    activityItem.appendChild(image);
    
                    activitiesList.appendChild(activityItem);
                });
            }
        }
    
        if (!hasActivities) {
            const noActivityBox = document.createElement('div');
            noActivityBox.classList.add('select-date-range');
            noActivityBox.textContent = 'No activities found for the selected range.';
            activitiesList.appendChild(noActivityBox);
        }
    }

    prevMonthButton.addEventListener('click', () => {
        currentMonth--;
        if (currentMonth < 0) {
            currentMonth = 11;
            currentYear--;
        }
        renderCalendar(currentMonth, currentYear);
    });

    nextMonthButton.addEventListener('click', () => {
        currentMonth++;
        if (currentMonth > 11) {
            currentMonth = 0;
            currentYear++;
        }
        renderCalendar(currentMonth, currentYear);
    });

    renderCalendar(currentMonth, currentYear);
});
