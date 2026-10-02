function createExamScheduleSurvey() {
  const form = FormApp.create('Exam Schedule Management System - User Analysis Survey');
  form.setDescription(
    'This survey is part of the SPM mini project analysis. Responses will be used only for academic project analysis.'
  );
  form.setCollectEmail(false);

  form.addMultipleChoiceItem()
      .setTitle('1. Which user are you?')
      .setChoiceValues(['Student','Administrator/Staff','Other'])
      .setRequired(true);

  form.addMultipleChoiceItem()
      .setTitle('2. How do you currently receive examination schedules?')
      .setChoiceValues(['Notice board','WhatsApp/Message','PDF/Document','College portal','Other'])
      .setRequired(true);

  form.addScaleItem()
      .setTitle('3. How easy is it to find the latest examination schedule?')
      .setBounds(1,5).setLabels('Very difficult','Very easy').setRequired(true);

  form.addMultipleChoiceItem()
      .setTitle('4. Have you ever received or used an outdated schedule?')
      .setChoiceValues(['Yes','No','Not sure']).setRequired(true);

  form.addCheckboxItem()
      .setTitle('5. Which information should be available in the system?')
      .setChoiceValues(['Subject','Date','Time','Room','Search','Student-specific timetable'])
      .setRequired(true);

  form.addMultipleChoiceItem()
      .setTitle('6. How useful would a search feature be?')
      .setChoiceValues(['Not useful','Slightly useful','Useful','Very useful'])
      .setRequired(true);

  form.addScaleItem()
      .setTitle('7. Rate the importance of accurate exam room information.')
      .setBounds(1,5).setLabels('Low','High').setRequired(true);

  form.addScaleItem()
      .setTitle('8. Rate the importance of quick access to the timetable.')
      .setBounds(1,5).setLabels('Low','High').setRequired(true);

  form.addMultipleChoiceItem()
      .setTitle('9. Which device would you normally use?')
      .setChoiceValues(['Mobile phone','Laptop/Desktop','Tablet'])
      .setRequired(true);

  form.addParagraphTextItem()
      .setTitle('10. What problem do you face with the current examination schedule process?');

  form.addMultipleChoiceItem()
      .setTitle('11. Would you prefer a web-based examination schedule system?')
      .setChoiceValues(['Yes','No','Maybe']).setRequired(true);

  form.addMultipleChoiceItem()
      .setTitle('12. How often should schedule information be updated?')
      .setChoiceValues(['Immediately when changed','Daily','Weekly','Only before exams'])
      .setRequired(true);

  form.addScaleItem()
      .setTitle('13. Overall, how useful would this system be?')
      .setBounds(1,5).setLabels('Not useful','Very useful').setRequired(true);

  form.addParagraphTextItem()
      .setTitle('14. Suggest one feature you would like to see.');

  form.addParagraphTextItem()
      .setTitle('15. Additional comments or suggestions.');

  Logger.log('Edit URL: ' + form.getEditUrl());
  Logger.log('Response URL: ' + form.getPublishedUrl());
}