pipeline {
    environment {
        AUTHOR_EMAIL = """${sh(
            returnStdout: true,
            script: 'git show -s --format="%ae" HEAD | sed "s/^ *//;s/ *$//"'
        )}"""
    }
    agent {
        docker {
            image 'codeception/codeception:2.5.2'
            args '''
                --volume="$PWD:/app"
                --workdir=/app
                --entrypoint=''
            '''
        }
    }
    stages {
        stage('code-quests.rdok.dev') {
            steps {
                sh 'codecept run codequests_rdok_dev --no-colors'
            }
        }
        stage('rdok.dev') {
            steps {
                sh 'codecept run rdok_dev --no-colors'
            }
        }
        stage('jenkins.rdok.dev') {
            steps {
                sh 'codecept run jenkins_rdok_dev --no-colors'
            }
        }
    }
    post {
        failure {
            mail (
                to: "${AUTHOR_EMAIL}",
                subject: "❌ ${BUILD_TAG} - Failure",
                body: "Job Url: ${env.JOB_URL}"
            )
        }
        success {
            mail (
                to: "${AUTHOR_EMAIL}",
                subject: "✔️ ${BUILD_TAG} - Stable",
                body: "Job Url: ${env.JOB_URL}"
            )
        }
    }
}