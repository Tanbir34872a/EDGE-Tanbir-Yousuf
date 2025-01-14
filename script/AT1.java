// Name: Tanbir Yousuf

package script;

import org.openqa.selenium.By;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.chrome.ChromeOptions;

public class AT1 {
	public static void main(String[] args) throws InterruptedException {
		System.setProperty("webdriver.chrome.driver", "C:\\Users\\tanbi\\lib\\chromedriver-win64\\chromedriver.exe");
		ChromeOptions option= new ChromeOptions();
		option.addArguments("--remote-allow-origins");
		ChromeDriver driver= new ChromeDriver(option);
		
		driver.get("http://collaborativemanagementsystemsqa.free.nf");
		Thread.sleep(1000);
		driver.findElement(By.name("username")).sendKeys("nouroj");
		driver.findElement(By.name("password")).sendKeys("nouroj@12");
		Thread.sleep(1000);
		driver.findElement(By.xpath("//*[@id=\"loginField\"]/div/input[2]")).click();
		Thread.sleep(1000);
		
		String expected = "http://collaborativemanagementsystemsqa.free.nf/view/client/client.php";
		String result = driver.getCurrentUrl();
		
		if (expected.equals(result)) {
			System.out.print("Success");
		} else {
			System.out.print("Fail");
		}
	}
}
