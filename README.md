# **EIE4432-Group-Project**
----
# 0. Coding Requirement
- All codes should be properly refactored. That is, codes should be re-usable and readable at your  best efforts. For example, any reusable codes should be encapsulated into functions and/or separate files for inclusion. You are recommended to use GitHub to host your codes to make it  easy for all team members to commit and integrate codes.

# 1. List of Functions
> ## User Registration
- **Two roles:** students or teachers
- **Common information:** login id, nick name, email, and profile image
- **Student specific information:** gender, birthday
- **Teacher specific information:** course

> ## User Login
- Use id and password to login
- Remember login status using cookie
- User logout (and delete cookie)
- Forget and reset password

> ## Teacher Releases an Exam
- Specify the time slot for an exam
- Add questions for an exam. For each question, specify the question type (multiple choice, true/false), answer, score, etc.
- ****(Optional)*** Add other question type (fill in the blank, short answer)

> ## Teacher Evaluates and Views Students' Submitted Answers
- ****(Optional)*** Check and grade the submitted answer (fill in the blank, short answer)
- View the exam result of each student (questions, submitted answers, correct answers, total score, score per question, submitted time)
- View statistics of the exam scores (max, min, median, average) and attempts statistics (percentage of correct answer and average score of each question)

> ## Student takes an exam
- Students can take an exam and submit answers
- Students can only start the exam within the specified time slot
- ****(Optional)*** Students’ answers will be saved and submitted automatically when time expires.
- View the exam result (questions, submitted answers, correct answers, total score, score per question, submitted time)

> ## System Management
- The system administrator can view all users’ information
- The system administrator can add/remove/modify user account (student and teacher)

# 2. Marking Scheme
- Project report: 50% 
    - All functions: 40%
    - Database design: 10%
- Video presentation: 40%
    - All functions: 20%
    - User experience and UI: 20%
- Source code: 10%