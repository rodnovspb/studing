const { Builder, By, until, Key } = require('selenium-webdriver');

const chrome = require('selenium-webdriver/chrome')

;(async function () {

    let driver = await new Builder().forBrowser('chrome').build();
    await driver.manage().setTimeouts({ implicit: 3000 });


    try {
        await driver.get('https://111222333.ru');
        let elem = await driver.findElement(By.css('.divisions__card:nth-child(5)'));

        const actions = driver.actions({async: true});
        await actions.move({origin: elem}).perform();


        setTimeout(async () => { }, 30000);

    } catch (e) {
        console.log('Ошибка:', e); }




    setTimeout(async () => { }, 30000);




    // try {
    //     await driver.get('https://111222333.ru');
    //     let elem = await driver.findElement(By.css('h1'));
    //     let text = await elem.getText();
    //     console.log('Текст заголовка:', text);
    // } catch (e) {
    //     console.log('Ошибка:', e); }




    // try {
    //     await driver.get('https://111222333.ru');
    //     let elem = await driver.findElement(By.css('h11'));
    // } catch (e) {
    //     console.log('Ошибка:', e); }


    // let options = new chrome.Options()
    // options.addArguments(['start-maximized'])
    // options.addArguments("user-data-dir=C:/Users/rodno/AppData/Local/Google/Chrome/User Data");
    // options.addArguments("profile-directory=Default");
    // let driver = await new Builder().forBrowser('chrome').setChromeOptions(options).build();

    // let elem = await driver.wait(until.elementIsVisible(driver.findElement(By.css('.Umvnrc'))))
    //
    // await elem.click()
    //
    // let elem1 = await driver.wait(until.elementIsVisible(driver.findElement(By.css('#K54'))), 10000);
    //
    // await elem1.click();

    // let element = await driver.findElement(By.css('.header__link'))


    // await driver.quit();


    // let element = await driver.findElement(By.css('a.Link.WorkerControls-Control.WorkerControls-Control_chat'))
    // await element.click();
    //
    // let whatsappLink = await driver.findElement(By.css('a.SocialLinkList-whatsapp'));
    // contact.whatsapp = await whatsappLink.getAttribute('href');
    // console.log('WhatsApp номер найден:', contact.whatsapp);
    // let telegramLink = await driver.findElement(By.css('a.SocialLinkList-telegram'));
    // contact.telegram = await telegramLink.getAttribute('href');
    // console.log('Telegram номер найден:', contact.telegram);

})();