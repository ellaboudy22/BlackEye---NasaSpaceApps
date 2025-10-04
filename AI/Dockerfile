FROM python:3.10-slim

WORKDIR /app

ENV PYTHONUNBUFFERED=1 PORT=3000

RUN apt-get update && apt-get install -y gcc g++ && rm -rf /var/lib/apt/lists/*

COPY requirements.txt .
RUN pip install --no-cache-dir -r requirements.txt

COPY . .

EXPOSE 3000

HEALTHCHECK --interval=30s --timeout=3s --start-period=5s --retries=1 \
  CMD python -c "exit(0)"

CMD ["python", "run_api.py"]
