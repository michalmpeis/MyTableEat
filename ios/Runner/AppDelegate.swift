import UIKit
import Flutter
import GoogleMaps

@UIApplicationMain
@objc class AppDelegate: FlutterAppDelegate {
  override func application(
    _ application: UIApplication,
    didFinishLaunchingWithOptions launchOptions: [UIApplication.LaunchOptionsKey: Any]?
  ) -> Bool {
    GeneratedPluginRegistrant.register(with: self)

    // Google Maps API key
                GMSServices.provideAPIKey("AIzaSyCFX7sAk_ZmnwI7rC2_4e9HKK2dp8APZ8c")

    return super.application(application, didFinishLaunchingWithOptions: launchOptions)
  }
}
