import sys
import os

sys.path.insert(0, os.path.dirname(__file__))

if __name__ == "__main__":
    import uvicorn
    from src.api.api_server import app

    port = int(os.getenv("PORT", 3000))
    print(f"Starting Advanced Exoplanet Prediction API on port {port}...")
    print(f"Dashboard: http://localhost:{port}")

    uvicorn.run(app, host="0.0.0.0", port=port)