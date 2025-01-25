const { Builder, By, until, Key } = require('selenium-webdriver');

const chrome = require('selenium-webdriver/chrome')

;(async function () {
    let contact = {};
    let driver = await new Builder().forBrowser('chrome').build();
    await driver.get('https://uslugi.yandex.ru/2-saint-petersburg/category?text=%D0%B8%D0%B7%D0%B3%D0%BE%D1%82%D0%BE%D0%B2%D0%BB%D0%B5%D0%BD%D0%B8%D0%B5+%D0%BF%D0%B5%D1%87%D0%B0%D1%82%D0%B8');
    let element = await driver.findElement(By.css('a.Link.WorkerControls-Control.WorkerControls-Control_chat'))
    await element.click();

    let whatsappLink = await driver.findElement(By.css('a.SocialLinkList-whatsapp'));
    contact.whatsapp = await whatsappLink.getAttribute('href');
    console.log('WhatsApp номер найден:', contact.whatsapp);
    let telegramLink = await driver.findElement(By.css('a.SocialLinkList-telegram'));
    contact.telegram = await telegramLink.getAttribute('href');
    console.log('Telegram номер найден:', contact.telegram);

})();

