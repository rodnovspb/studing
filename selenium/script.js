

const { Builder, By, until, Key } = require('selenium-webdriver');

const chrome = require('selenium-webdriver/chrome')
const path = require('path')


let options = new chrome.Options()


// options.addArguments(`user-data-dir=${path.join(__dirname, 'profile')}`)
// options.addArguments(`profile-directory=Default`);

options.addArguments(['start-maximized'])

;(async function () {

    let driver = await new Builder().forBrowser('chrome').setChromeOptions(options).build();



    try {

        await driver.get('https://uslugi.yandex.ru/profile/Avegaprint-1047311');

        await driver.findElement(By.css('a.WorkerControls-Control_chat')).click();

        await driver.findElement(By.xpath("//div[contains(text(), 'Я.Мессенджер')]")).click();

        let frame = await driver.wait(until.elementLocated(By.css('iframe.ya-chat-base__iframe')), 8000);

        await driver.switchTo().frame(frame);

        let textarea = await driver.wait(until.elementLocated(By.xpath("//textarea[@placeholder='Сообщение…']")), 8000);

        await textarea.sendKeys('Добрый день!', Key.ENTER)

        // let frames = await driver.wait(until.elementsLocated(By.css('iframe.ya-chat-base__iframe')), 8000);

        // // Проверка наличия iframe
        // if (frames.length > 0) {
        //     console.log('Iframe найден');
        //     // Переключение на первый найденный iframe
        //     await driver.switchTo().frame(frames[0]);
        //
        //     let textarea = await driver.wait(until.elementLocated(By.xpath("//textarea[@placeholder='Сообщение…']")), 8000);
        //
        //     await textarea.sendKeys('Добрый день!', Key.ENTER)
        //
        //
        // } else {
        //     console.log('Iframe не найден');
        // }










    } catch (e) {
        console.log('Ошибка:', e); }



    // const fs = require('fs');
    // let proxy = require('selenium-webdriver/proxy');

    // let proxyAddress = '136.243.175.104:47046'

// options.setProxy(proxy.manual({http: proxyAddress, https: proxyAddress}));


    // options.addArguments(`user-data-dir=${path.join(__dirname, 'profile')}`)
    // options.addArguments(`profile-directory=Default`);


    // let elem = await driver.findElement(By.css('.divisions__card:nth-child(5)'));
    //
    // await driver.executeScript("arguments[0].scrollIntoView();", elem);
    //
    // const screenshot = await driver.takeScreenshot();
    // fs.writeFileSync('screenshot.png', screenshot, 'base64');





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